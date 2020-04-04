<template>
  <navbar
    position="fixed"
    type="white"
    :transparent="transparent"
    :color-on-scroll="colorOnScroll"
    menu-classes="ml-auto"
  >
    <template>
      <router-link v-popover:popover1 class="navbar-brand" to="/">
        <img class="n-logo" src="images/EWAHaaglanden_logo.png" alt="" style="width: 200px" />
      </router-link>
      <el-popover
        ref="popover1"
        popper-class="popover"
        placement="bottom"
        width="200"
        trigger="hover"
      >
        <div class="popover-body">
         Ontworpen en gemaakt door studenten.
        </div>
      </el-popover>
    </template>
    <template slot="navbar-menu">
      <li class="nav-item">
        <nav-link
          class="nav-link"
          to="/home"
        >
          <i class="now-ui-icons objects_planet"></i>
          <p>Home</p>
        </nav-link>
      </li>
      <li class="nav-item">
       <nav-link
          class="nav-link"
          to="/informatie"
          
        >
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>Informatie</p>
       </nav-link>
      </li>
      <li class="nav-item">
        <nav-link
          class="nav-link"
          to="/posts"
        >
          <i class="now-ui-icons files_paper"></i>
          <p>Nieuws</p>
        </nav-link>
      </li>
      
      <li class="nav-item">
        <a
          class="nav-link btn"
          href="/"
          style="background-color: #FFB300"
        >
          <i class="now-ui-icons users_single-02"></i>
          <p>Login</p>
        </a>
      </li>

    
    </template>
  </navbar>
</template>

<script>
import { Navbar, NavLink } from '../components';
import { Popover } from 'element-ui';
export default {
  name: 'main-navbar',
  props: {
    transparent: Boolean,
    colorOnScroll: Number,
  },
  components: {
    Navbar,
    NavLink,
    [Popover.name]: Popover
  },
};
</script>

<style scoped>



</style>
