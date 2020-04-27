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
      <div class="container">
        <div class="row" style="padding-left: 1rem;">
        <button 
        type="button"
        :class="{'btn btn-danger': !posts, 'btn btn-success': posts}"
        @click='posts = !posts; contacts = false; partners = false;'> 
        News</button>
        <button 
        type="button"
        :class="{'btn btn-danger': !contacts, 'btn btn-success': contacts}"
        @click='contacts = !contacts; posts = false; partners = false;'> 
        Newsletters </button>
        <button 
        type="button"
        :class="{'btn btn-danger': !partners, 'btn btn-success': partners}"
        @click='partners = !partners; posts = false; contacts = false;'> 
        Partners </button>
        
      </div>
      </div>
      <div class="container">
        <div class="row">
          <nav-link
              class="nav-link"
              to="/admin/dashboard/post/create"
              v-if='posts'
              style="display:inline; width:auto;"
            >
              <button
                style="background-color:black;"
                type="button"
                class="btn btn-dark"
              >Create news article</button>
            </nav-link>
            <nav-link
              class="nav-link"
              to="/admin/dashboard/partner/create"
              v-if='partners'
              style="display:inline;width:auto;"
            >
              <button
                style="background-color:black;"
                type="button"
                class="btn btn-dark"
              >Create partner</button>
            </nav-link>
        </div>
      </div>
    </section>

    <DashboardPosts
    v-if='posts'
    ></DashboardPosts>

    <DashboardContacts
    v-if='contacts'
    ></DashboardContacts>

    <DashboardPartners
    v-if='partners'
    ></DashboardPartners>

  </div>
</template>

<script>
import DashboardPosts from "../pages/components/Post/DashboardPosts";
import DashboardContacts from "../pages/components/Contact/DashboardContacts";
import DashboardPartners from "../pages/components/Partner/DashboardPartners";

import { NavLink } from "../components";

export default {
  name: "Dashboard",
  components: {
    DashboardPosts,
    DashboardContacts,
    DashboardPartners,
    NavLink
  },
  data() {
    return {
      header: "Admin Dashboard",
      posts: false,
      contacts: false,
      partners: false,
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