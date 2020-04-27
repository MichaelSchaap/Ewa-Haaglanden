<template>
  <form method="post" enctype="multiplart/form-data">
    <div class="content" style>
      <div class="container" style="width:85%">
        <div class="row">
          <div class="col-12">
            <input
              class="form-control"
              id="name"
              v-model="name"
              type="text"
              placeholder="Naam"
              style="margin-bottom:2%;"
            />
          </div>

          <div class="col-6">
            <span style="white-space: pre;">
              <textarea
                class="form-control"
                id="website"
                rows="4"
                cols="80"
                v-model="website"
                type="text"
                placeholder="Vul in de website van de partner"
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
</template>

<script>
export default {
  name: "DashboardFormEditPartner",
  methods: {
    async editPartner() {
      this.$store
        .dispatch("partner/edit", {
          partnerId: this.$route.params.Pid,
          name: this.name,
          website: this.website,
          img: this.img
        })
        .catch(error => {
          console.log(error);
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
        this.img = e.target.result;
      };
    }
  },
  props: {
    name: {
      type: String,
      required: true
    },
    website: {
      type: String,
      required: true
    },
    img: {
      type: String,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
