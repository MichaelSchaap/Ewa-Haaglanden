<template>
  <div v-if="isAuthenticated">
    <section class="news-intro" style="background-color: #FFB300;padding-top:8%;margin-bottom:3%">
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
        <div class="row" style="padding-left: 1rem;text-align:center">
        <button 
        type="button"
        
        :class="{'btn btn-danger': !posts, 'btn btn-success': posts}"
        @click='posts = !posts; contacts = false; partners = false; documents = false;'> 
        News</button>
        <button 
        type="button"
        
        :class="{'btn btn-danger': !contacts, 'btn btn-success': contacts}"
        @click='contacts = !contacts; posts = false; partners = false; documents = false;'> 
        Newsletters </button>
        <button 
        type="button"
        
        :class="{'btn btn-danger': !partners, 'btn btn-success': partners}"
        @click='partners = !partners; posts = false; contacts = false; documents = false;'> 
        Partners </button>
        <button 
        type="button"
   
        :class="{'btn btn-danger': !documents, 'btn btn-success': documents}"
        @click='documents = !documents; posts = false; contacts = false; partners = false;'> 
        Informatie </button>
        
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
            <nav-link
              class="nav-link"
              to="/admin/dashboard/document/create"
              v-if='documents'
              style="display:inline;width:auto;"
            >
              <button
                style="background-color:black;"
                type="button"
                class="btn btn-dark"
              >Create bestand</button>
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

    <DashboardDocuments
    v-if='documents'
    ></DashboardDocuments>

  </div>
</template>

<script>
import DashboardPosts from "../pages/components/Post/DashboardPosts";
import DashboardContacts from "../pages/components/Contact/DashboardContacts";
import DashboardPartners from "../pages/components/Partner/DashboardPartners";
import DashboardDocuments from "../pages/components/Document/DashboardDocuments";

import { NavLink } from "../components";

export default {
  name: "Dashboard",
  components: {
    DashboardPosts,
    DashboardContacts,
    DashboardPartners,
    DashboardDocuments,
    NavLink
  },
  data() {
    return {
      header: "Admin Dashboard",
      posts: false,
      contacts: false,
      partners: false,
      documents: false,
    };
  },
  computed: {
    isAuthenticated() {
      return this.$store.getters["security/isAuthenticated"]
    },
  }
};
</script>

<style lang="scss" scoped>
@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro {
  @include angled-edge("outside bottom", "lower left", #ffb300);
}

</style>