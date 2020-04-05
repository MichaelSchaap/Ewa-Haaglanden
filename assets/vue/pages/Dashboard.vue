<template>

<div>
<section class="news-intro" style="background-color: #FFB300;padding-top:2%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
             <h2 class="title" style="color: black; font-size:50px; ">{{ header }}</h2>
          </div>
        </div>
      </div>
</section>

   <div class="container" style=" margin-top:3%;">

     <div v-if="canCreatePost" style="margin-bottom:5%;">
      <form>
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
                    id="category"
                    v-model="category"
                    type="text"
                    placeholder="Category"
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
                    id="img"
                    v-model="img"
                    type="text"
                    placeholder="Image"
                  >
                
                  
                  <button
                    :disabled="title.length === 0 || category.length === 0 || content.length === 0 || isLoading"
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

      <br>

     </div>
      </div>
       </div>

   


</template>

<script>
import Post from "../pages/components/Post";
import ErrorMessage from "../pages/components/ErrorMessage";

export default {
  name: "Dashboard",
  components: {
    Post,
    ErrorMessage,
  },
  data() {
    return {
      title: "",
      category: "",
      content: "",
      reaction: null,
      img: "",
      header: 'Dashboard.'
    };
  },
  computed: {
    canCreatePost() {
      return this.$store.getters["security/hasRole"]("ROLE_ADMIN");
    }
  },
  created() {
    this.$store.dispatch("post/findAll");
  },
  methods: {
    async createPost() {
      let payload = {title: this.$data.title, category: this.$data.category, content: this.$data.content, img: this.$data.img};
      
      const result = await this.$store.dispatch("post/create", payload);
      
      if (result !== null) {
        this.$data.title = "";
        this.$data.category = "";
        this.$data.content = "";
        this.$data.img = "";
      }
    }
  }
};
</script>

<style lang="scss" scoped>

.spinner-border {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 50%;
  right: 50%; /* or: left: 50%; */

}


@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro{
@include angled-edge('outside bottom', 'lower right', #FFB300);
}
</style>