<template>
  <section class="EditPartner">
    <div class="container h-100" style>
      <div class="row h-100 justify-content-center align-items-center">
        <div style>
          <form method="post" enctype="multiplart/form-data">
            <div class="content" style>
              <div class="container" style="width:85%">
                <div class="row">
                  <div class="col-12">
                    <input
                      class="form-control"
                      id="title"
                      v-model="newName"
                      type="text"
                      placeholder="Titel"
                      style="margin-bottom:2%;"
                    />
                  </div>
                  <div class="col-6">
                    <span style="white-space: pre;">
                      <textarea
                        class="form-control"
                        id="content"
                        rows="4"
                        cols="80"
                        v-model="newWebsite"
                        type="text"
                        placeholder="Vul in de inhoud van de artikel"
                        style="margin-bottom:2%;"
                      ></textarea>
                    </span>
                  </div>
                  <div class="col-6">
                    <input
                      class="form-control"
                      type="file"
                      ref="files"
                      name="files"
                      style="width:100%;border:none;margin-bottom:2%;padding-left:0px;"
                      @change="onFileSelected"
                      placeholder="Image"
                      accept="image/jpeg, image/png"
                    />
                    <img :src="newImg" alt="Afbeelding voorbeeld" style="width:150px; height:auto;" />
                  </div>
                  <div class="col-6">
                  <button
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="goBack()"
                  >Terug</button>
                  </div>
                  <div class="col-6">
                  <button
                    :disabled="isLoading"
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="editPartner()"
                  >Veranderen</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <br />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "DashboardEditPartner",
  data() {
    return {
      newName: "",
      newWebsite: "",
      newImg: ""
    };
  },
  computed: {
    isLoading() {
      return this.$store.getters["partner/isLoading"];
    },
    hasError() {
      return this.$store.getters["partner/hasError"];
    },
    error() {
      return this.$store.getters["partner/error"];
    },
    hasPartners() {
      return this.$store.getters["partner/hasPartners"];
    },
    partners() {
      return this.$store.getters["partner/partners"];
    }
  },
  created() {
    this.$store.dispatch("partner/findAll");
  },
  methods: {
    async editPartner() {
      this.$store.dispatch("partner/edit", {
        partnerId: this.$route.params.Pid,
        name: this.newName,
        website: this.newWebsite,
        img: this.newImg
      })
      .catch(error => {
        console.log(error)
      });

    },

    goBack() {
        this.$router.push({ path: "/admin/dashboard" });
    },

    onFileSelected(event) {
      let image = event.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        this.newImg = e.target.result;
      };
    }
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
