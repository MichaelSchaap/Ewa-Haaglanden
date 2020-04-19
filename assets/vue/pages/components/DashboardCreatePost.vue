<template>
  <section v-if="canCreatePost" class="createPost">
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
                      v-model="title"
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
                        v-model="content"
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
                    <img :src="img" alt="Afbeelding voorbeeld" style="width:150px; height:auto;" />
                  </div>
                  <button
                    :disabled="title.length === 0 || content.length === 0 || isLoading"
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="createPost()"
                  >Aanmaken</button>
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
  name: "DashboardCreatePost",
  data() {
    return {
      title: "",
      content: "",
      img: null
    };
  },
  computed: {
    isLoading() {
      return this.$store.getters["post/isLoading"];
    },
    hasError() {
      return this.$store.getters["post/hasError"];
    },
    error() {
      return this.$store.getters["post/error"];
    },
    hasPosts() {
      return this.$store.getters["post/hasPosts"];
    },
    posts() {
      return this.$store.getters["post/posts"];
    },
    canCreatePost() {
      return this.$store.getters["security/hasRole"]("ROLE_ADMIN");
    }
  },
  created() {
    this.$store.dispatch("post/findAll");
  },
  methods: {
    async createPost() {
      const result = await this.$store.dispatch("post/create", {
        title: this.title,
        content: this.content,
        img: this.img
      });

      if (result !== null) {
        this.$data.title = "";
        this.$data.content = "";
        this.$data.img = null;
      }
      
      this.$router.push({ path: "/posts/dashboard" });
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
