<template>
  <div>
    <div class="row col">
      <h1>Posts</h1>
    </div>

    <div class="row col">
      <form>
        <div class="form-row">
          <div class="col-8">
            <input
              v-model="title"
              type="text"
              class="form-control"
            >
            <input
              v-model="category"
              type="text"
              class="form-control"
            >
            <input
              v-model="content"
              type="text"
              class="form-control"
            >
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
    </div>

    <div
      v-if="isLoading"
      class="row col"
    >
      <p>Loading...</p>
    </div>

    <div
      v-else-if="hasError"
      class="row col"
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
      class="row col"
    >
      No posts!
    </div>

    <div
      v-for="post in posts"
      v-else
      :key="post.id"
      class="row col"
    >
      <post 
      :title="post.title"
      :category="post.category"
      :content="post.content"
      :img="post.img"
       />
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