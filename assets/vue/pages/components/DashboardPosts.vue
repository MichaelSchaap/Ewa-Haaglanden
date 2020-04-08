<template>
    <section class="allPosts">
        <div class="container  h-100">
        <div class="row h-100 justify-content-center align-items-center">
            <table class="table table-striped table-bordered table-hover">
                <thead class="thead-dark">
                    <tr>
                        <th>Title</th>
                        <th>Date created</th>
                        <th>Date updated</th>
                        <th>Acties</th>
                    </tr>
                </thead>
                <tbody>
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
                    >
                    <DashboardPost
                        :title="post.title"
                        :created="post.created"
                        :updated="post.updated"
                    />
                    </div>
                </tbody>
            </table>
        </div>
        </div>
    </section>
</template>

<script>
import DashboardPost from '../components/DashboardPost';
import ErrorMessage from "../../pages/components/ErrorMessage";

export default {
  name: 'DashboardPosts',
  components: {
      DashboardPost,
      ErrorMessage,
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
    },
    canCreatePost() {
      return this.$store.getters["security/hasRole"]("ROLE_ADMIN");
    }
  },
  created() {
    this.$store.dispatch("post/findAll");
  }
  
}
</script>

<style lang="scss" scoped>

.spinner-border {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 50%;
  right: 50%; /* or: left: 50%; */

}

body {
  margin: 0 !important;
}
</style>
