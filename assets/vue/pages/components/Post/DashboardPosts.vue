<template>
  <section class="allPosts">
    <div class="container">
      <div class="row">

        <div style="display:block; margin-left:2%;margin-top: 5%">
        <button 
        @click="prevPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber==0"
        >
        Previous
        </button>
        <button 
        @click="nextPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber >= pageCount -1"
        >
        Next
        </button>
        </div>

        <table
          style="display:block; margin-left:2%;"
          class="table table-striped table-hover table-responsive"
        >
          <thead class="thead-dark">
            <tr>
              <th style="width:30%">Titel</th>
              <th style="width:30%">Content</th>
              <th style="width:10%">Date created</th>
              <th style="width:20%">Acties</th>
            </tr>
          </thead>
          <tbody>
            <div v-if="isLoading" class="container" style="margin-top:4%; margin-left:140%">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
            </div>
            <div v-else-if="hasError" class="row">
              <div class="alert alert-danger" role="alert">
                <error-message :error="error" />
              </div>
            </div>

            <div v-else-if="!hasPosts" class="row" style="margin-left:5%;">No posts!</div>
            <tr v-for="post in paginatedData" 
            v-else 
            :key="post.id"
            >
              <td style="width:15%">{{post.title}}</td>
              <td style="width:15%">{{post.content.slice(0,250) + '...'}}</td>
              <td style="width:5%">{{post.created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10)}}</td>
              <td style="width:20%">
                <button
                  type="button"
                  class="btn btn-danger"
                  @click="deletePost(post.id)"
                  style="width:100%"
                >Verwijderen</button>
                <button type="button" class="btn btn-info" @click="goToNews(post.id)" style="width:100%">Bekijken</button>
                <button
                  style="background-color:black;width:100%"
                  type="button"
                  @click="goToPost(post.id)"
                  
                  class="btn btn-info"
                >Verander</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="display:block;margin-bottom:10%; margin-left:2%;">
        <button 
        @click="prevPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber==0"
        >
        Previous
        </button>
        <button 
        @click="nextPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber >= pageCount -1"
        >
        Next
        </button>
        </div>


      </div>
    </div>
  </section>
</template>

<script>
import ErrorMessage from "../../../pages/components/ErrorMessage";

export default {
  name: "DashboardPosts",
  components: {
    ErrorMessage
  },
  props:{
    size:{
      type:Number,
      required:false,
      default: 10
    }
  },
  data() {
    return {
      id: "",
      title: "",
      content: "",
      img: "",
      pageNumber: 0,  // default to page 0
    };
  },
  methods: {

    deletePost(postId) {
      let i = this.posts.map(post => post.id).indexOf(postId)
      this.posts.splice(i, 1);
      this.$store.dispatch("post/DELETE_POST", {
        postId
      });
    
    },
    goToNews(postId) {
      this.$router.push({ name: "PostDetails", params: { Pid: postId } });
    },
    goToPost(postId) {
      this.$router.push({ name: "DashboardEditPosts", params: { Pid: postId } });
    },

    nextPage(){
        this.pageNumber++;
    },
    prevPage(){
        this.pageNumber--;
    }

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
    },
    pageCount(){
      let l = this.posts.length,
          s = this.size;
      return Math.ceil(l/s);
    },
    paginatedData(){
    const start = this.pageNumber * this.size,
          end   = start + this.size;     
    return this.posts.slice(start, end).sort(function(a, b) {
        return a.created < b.created ? 1 : -1;
      });
    }
  },
  created() {
    this.$store.dispatch("post/findAll");
  }
};
</script>

<style lang="scss" scoped>


body {
  margin: 0 !important;
}
</style>
