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

   <div class="container" style=" margin-top:3%;">

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
        <error-message :error="error" />
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
import ErrorMessage from "../pages/components/ErrorMessage";

export default {
  name: "Posts",
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
    },
    canCreatePost() {
      return this.$store.getters["security/hasRole"]("ROLE_ADMIN");
    }
  },
  created() {
    this.$store.dispatch("post/findAll");
  },
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