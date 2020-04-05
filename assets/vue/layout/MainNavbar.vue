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
          <p>Home</p>
        </nav-link>
      </li>
      <li class="nav-item">
       <nav-link
          class="nav-link"
          to="/informatie"
          
        >
          <p>Informatie</p>
       </nav-link>
      </li>
      <li class="nav-item">
        <nav-link
          class="nav-link"
          to="/posts"
        >
          <p>Nieuws</p>
        </nav-link>
      </li>
      
      <li 
      class="nav-item">
        <nav-link
          class="nav-link"
          to="/login"
        >
          <p>Login</p>
        </nav-link>
      </li>

      <li 
      v-if="isAuthenticated"
      class="nav-item">
        <nav-link
          class="nav-link"
          to="/api/security/logout"
        >
          <p>Logout</p>
        </nav-link>
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
  computed: {
    isAuthenticated() {
      return this.$store.getters['security/isAuthenticated']
    },
  },
};
</script>

<style scoped>

</style>
