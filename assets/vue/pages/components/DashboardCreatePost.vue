<template>
<section v-if="canCreatePost" class="createPost">
 <div class="container h-100" style="margin-top:15%">
  <div class="row h-100 justify-content-center align-items-center">
    <div style="margin-bottom:5%;">
      <form method="post" enctype="multiplart/form-data">
        <div class="content" style="">
            <div class="container">
              <div class="row">
                  <input
                    class="form-control"
                    id="title"
                    v-model="title"
                    type="text"
                    placeholder="Title"
                  >
                  <input
                    class="form-control"
                    id="content"
                    v-model="content"
                    type="text"
                    placeholder="Content"
                  >        
                  <input
                    class="form-control"
                    type="file"
                    ref="files"
                    name="files"
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
                    Create
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
  }

  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
