<template>
<section v-if="canCreatePost" class="createPost">
 <div class="container h-100" style="">
  <div class="row h-100 justify-content-center align-items-center">
    <div style="">
      <form method="post" enctype="multiplart/form-data">
        <div class="content" style="">
            <div class="container" style="width:85%">
              <div class="row">
                  <input
                    class="form-control"
                    id="title"
                    v-model="title"
                    type="text"
                    placeholder="Titel"
                    style="margin-bottom:2%;"
                  >
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
                  <input
                    class="form-control"
                    type="file"
                    ref="files"
                    name="files"
                    style="width:25%;border:none;margin-bottom:2%;"
                    @change="onFileSelected"
                    placeholder="Image"
                    accept="image/jpeg, image/png"
                  >                                 
                  <button
                    :disabled="title.length === 0 || content.length === 0 || isLoading"
                    type="button"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="createPost()"
                  >
                    Aanmaken
                  </button>
                </div>
              </div>
            </div>
        </form>
        <img :src="img" alt="Image">
      <br>
     </div>
    </div>
 </div>
</section>
</template>

<script>

export default {
  name: 'DashboardCreatePost',
  data() {
    return {
      title: "",
      content: "",
      img: null,
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
      const result = await this.$store.dispatch("post/create", {title: this.title, content: this.content, img: this.img});
      
      if (result !== null) {
        this.$data.title = "";
        this.$data.content = "";
        this.$data.img = null;
      }
    },

  onFileSelected(event){
   let image = event.target.files[0];
   let reader = new FileReader();
   reader.readAsDataURL(image);
   reader.onload = e => {
     this.img = e.target.result
   }
  },


  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
