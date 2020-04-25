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

    <section class="createPost">
      <div class="container" style>
        <nav-link
          class="nav-link"
          to="/posts/dashboard/create"
          style="display:inline; padding-right: 0%; padding-left:0%;"
        >
          <button
            style="background-color:black;"
            type="button"
            class="btn btn-dark"
          >Maak nieuw artikel</button>
        </nav-link>
        <button 
        type="button"
        class="btn btn-info"
        @click='posts = !posts'> 
        Show posts only </button>
        <button 
        type="button"
        class="btn btn-info"
        @click='contacts = !contacts'> 
        Show e-mails only </button>
      </div>
    </section>

    <DashboardPosts
    v-if='posts'
    ></DashboardPosts>
    <DashboardContacts
    v-if='contacts'
    ></DashboardContacts>
  </div>
</template>

<script>
import DashboardPosts from "../pages/components/DashboardPosts";
import DashboardContacts from "../pages/components/DashboardContacts";

import { NavLink } from "../components";

export default {
  name: "Dashboard",
  components: {
    DashboardPosts,
    DashboardContacts,
    NavLink
  },
  data() {
    return {
      header: "News Dashboard",
      posts: true,
      contacts: false,
    };
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro {
  @include angled-edge("outside bottom", "lower right", #ffb300);
}
</style>