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

    <div class="row col">
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
    </div>


</div>
</div>


</template>

<script>


export default {
  name: "CreatePost",
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

