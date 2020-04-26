<template>
  <section class="createPartner">
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
                      v-model="name"
                      type="text"
                      placeholder="Naam"
                      style="margin-bottom:2%;"
                    />
                  </div>
                  <div class="col-6">
                    <input
                      class="form-control"
                      id="title"
                      v-model="website"
                      type="text"
                      placeholder="Website"
                      style="margin-bottom:2%;"
                    />
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
                    <img :src="img" alt="Afbeelding voorbeeld" style="width:150px; height:auto;" />
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
                    :disabled="name.length === 0 || website.length === 0 || isLoading"
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="createPartner()"
                  >Aanmaken</button>
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
  name: "DashboardCreatePartner",
  data() {
    return {
      name: "",
      website: "",
      img: null
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
    async createPartner() {
      const result = await this.$store.dispatch("partner/create", {
        name: this.name,
        website: this.website,
        img: this.img
      });

      if (result !== null) {
        this.$data.name = "";
        this.$data.website = "";
        this.$data.img = null;
      }
      
    },

    goBack() {
        this.$router.push({ path: "/admin/dashboard" });
    },

    onFileSelected(event) {
      let image = event.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(image);
      reader.onload = e => {
        this.img = e.target.result;
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
