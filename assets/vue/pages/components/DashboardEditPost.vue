<template>
  <section v-if="canCreatePost" class="EditPost">
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
                      v-model="newTitle"
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
                        v-model="newContent"
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
                  <button
                    :disabled="isLoading"
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="editPost()"
                  >Veranderen</button>
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
  name: "DashboardEditPost",
  data() {
    return {
      newTitle: "",
      newContent: "",
      newImg: ""
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
    async editPost() {
      this.$store.dispatch("post/edit", {
        postId: this.$route.params.Pid,
        title: this.newTitle,
        content: this.newContent,
        img: this.newImg
      })
      .catch(error => {
        console.log(error)
      });
      this.$router.push({ path: "/posts/dashboard" });
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
