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
         Ontworpen door EWA. Gemaakt door Michael Schaap
        </div>
      </el-popover>
    </template>
    <template slot="navbar-menu">
      <li class="nav-item">
        <a
          class="nav-link"
          href="#/landing"
        >
          <i class="now-ui-icons arrows-1_cloud-download-93"></i>
          <p>Informatie</p>
        </a>
      </li>
      <drop-down
        tag="li"
        title="Ontwikkelpaden"
        icon="now-ui-icons design_app"
        class="nav-item"
      >
        <nav-link to="/login">
          <i class="now-ui-icons business_chart-pie-36"></i> Ontwikkelpad A
        </nav-link>
        <nav-link to="/profile">
          <i class="now-ui-icons business_chart-pie-36"></i> Ontwikkelpad B
        </nav-link>
        <nav-link to="/landing">
          <i class="now-ui-icons business_chart-pie-36"></i> Ontwikkelpad C
        </nav-link>

      </drop-down>
      <li class="nav-item">
        <a
          class="nav-link btn"
          href="#/login"
          style="background-color: #FFB300"
        >
          <i class="now-ui-icons users_single-02"></i>
          <p>Login</p>
        </a>
      </li>

      <li class="nav-item">
        <a
          class="nav-link"
          rel="tooltip"
          title="Follow us on Twitter"
          data-placement="bottom"
          href="#/"
          target="_blank"
        >
          <i class="fab fa-twitter"></i>
          <p class="d-lg-none d-xl-none">Twitter</p>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          rel="tooltip"
          title="Like us on Facebook"
          data-placement="bottom"
          href="#/"
          target="_blank"
        >
          <i class="fab fa-facebook-square"></i>
          <p class="d-lg-none d-xl-none">Facebook</p>
        </a>
      </li>
      <li class="nav-item">
        <a
          class="nav-link"
          rel="tooltip"
          title="Follow us on Instagram"
          data-placement="bottom"
          href="#/"
          target="_blank"
        >
          <i class="fab fa-instagram"></i>
          <p class="d-lg-none d-xl-none">Instagram</p>
        </a>
      </li>
    </template>
  </navbar>
</template>

<script>
import { DropDown, Navbar, NavLink } from '../components';
import { Popover } from 'element-ui';
export default {
  name: 'main-navbar',
  props: {
    transparent: Boolean,
    colorOnScroll: Number
  },
  components: {
    DropDown,
    Navbar,
    NavLink,
    [Popover.name]: Popover
  }
};
</script>

<style scoped></style>
