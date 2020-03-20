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
        <router-link class="nav-link" to="/">
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>Home</p>
        </router-link>
      </li>
      <li class="nav-item">
        <router-link class="nav-link" to="/landing">
          <i class="now-ui-icons files_single-copy-04"></i>
          <p>Informatie</p>
        </router-link>
      </li>
      <drop-down
        tag="li"
        title="Ontwikkelpaden"
        icon="now-ui-icons design_bullet-list-67"
        class="nav-item"
      >
        <nav-link to="/">
          <i class="now-ui-icons design_app"></i> Ontwikkelpad A
        </nav-link>
        <nav-link to="/landing">
          <i class="now-ui-icons design_app"></i> Ontwikkelpad B
        </nav-link>
        <nav-link to="/">
          <i class="now-ui-icons design_app"></i> Ontwikkelpad C
        </nav-link>

      </drop-down>
      <li class="nav-item">
        <a
          class="nav-link btn"
          href="#/"
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
