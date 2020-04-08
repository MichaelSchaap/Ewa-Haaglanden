<template>

<div>
<section class="news-intro" style="background-color: #FFB300;padding-top:4%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
             <h2 class="title" style="color: black; font-size:50px; ">{{ header }}</h2>
          </div>
        </div>
      </div>
</section>

<section class="createPost">
    <div class="container" style="">
        <nav-link
          class="nav-link"
          to="/posts/dashboard/create"
        >
          <p>Maak nieuw artikel</p>
        </nav-link>
    </div>
</section>


<DashboardPosts></DashboardPosts>


</div>
<!-- End Modal -->

</template>

<script>

import DashboardPosts from '../pages/components/DashboardPosts';
import { NavLink } from '../components';

export default {
  name: "Dashboard",
  components: {
      DashboardPosts,
      NavLink,
  },
  data() {
    return {
      header: "News Dashboard"
    };
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