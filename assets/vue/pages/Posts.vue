<template>

<div>
<section class="news-intro" style="background-color: #FFB300;padding-top:8%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
             <h2 class="title" style="color: black; font-size:50px; ">{{ header }}</h2>
          </div>
        </div>
      </div>
</section>

   <div class="container" style=" margin-top:5%;">

    <!-- <div class="row col">
      <form>
        <div class="form-row">
          <div class="col-2">
            <input
              v-model="title"
              type="text"
              class="form-control"
            >
            </div>
            <div class="col-2">
            <input
              v-model="category"
              type="text"
              class="form-control"
            >
            </div>
            <div class="col-2">
            <input
              v-model="content"
              type="text"
              class="form-control"
            >
            </div>
            <div class="col-2">
            <input
              v-model="img"
              type="text"
              class="form-control"
            >
          </div>
          <div class="col-4">
            <button
              :disabled="title.length === 0 || category.length === 0 || content.length === 0 || isLoading"
              type="button"
              class="btn btn-primary"
              @click="createPost()"
            >
              Create
            </button>
          </div>
        </div>
      </form>
    </div> -->
<div class="row">

    <div
      v-if="isLoading"
      class="container"
    >
      <div class="spinner-border" role="status">
        <span class="sr-only">Loading...</span>
    </div>
    </div>

  

    <div
      v-else-if="hasError"
      class="row"
    >
      <div
        class="alert alert-danger"
        role="alert"
      >
        {{ error }}
      </div>
    </div>

    <div
      v-else-if="!hasPosts"
      class="row"
    >
      No posts!
    </div>

    
    <div
      v-for="post in posts"
      v-else
      :key="post.id"
      class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
    >


      <post 
      :title="post.title"
      :category="post.category"
      :content="post.content"
      :img="post.img"
      :created="post.created"
       />
     </div>


  </div>

</div>
</div>


</template>

<script>
import Post from "../pages/components/Post";

export default {
  name: "Posts",
  components: {
    Post
  },
  data() {
    return {
      title: "",
      category: "",
      content: "",
      img: "",
      header: 'NIEUWS.'
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
    }
  },
  created() {
    this.$store.dispatch("post/findAll");
  },
  methods: {
    async createPost() {
      const result = await this.$store.dispatch("post/create", this.$data.title, this.$data.category, this.$data.content, this.$data.img);
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
@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro{
@include angled-edge('outside bottom', 'lower right', #FFB300);
}
</style>