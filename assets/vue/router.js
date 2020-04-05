import Vue from 'vue';
import VueRouter from 'vue-router';
import store from "../vue/store";
import Index from './pages/Index.vue';
import Information from './pages/Information.vue';
import Posts from './pages/Posts.vue';
import Login from './pages/Login.vue';
import CreatePost from './pages/CreatePost.vue';
import MainNavbar from './layout/MainNavbar.vue';
import MainFooter from './layout/MainFooter.vue';

Vue.use(VueRouter);

let router = new VueRouter({
  mode: "history",
  routes: [
    {
      path: '/home',
      name: 'index',
      components: { default: Index, header: MainNavbar, footer: MainFooter },
      props: {
        header: { colorOnScroll: 400 },
        footer: { backgroundColor: 'black' }
      }
    },
    {
      path: '*',
      redirect: { name: 'index' }
    },
    {
      path: '/informatie',
      name: 'information',
      components: { default: Information, header: MainNavbar, footer: MainFooter },
      props: {
        header: { colorOnScroll: 400 },
        footer: { backgroundColor: 'black' }
      }
    },
    {
      path: '/posts',
      name: 'Posts',
      components: { default: Posts, header: MainNavbar, footer: MainFooter },
      props: {
        header: { colorOnScroll: 0 },
        footer: { backgroundColor: 'black' }
      }
    },
    {
      path: '/aanmaken',
      name: 'CreatePost',
      components: { default: CreatePost, header: MainNavbar, footer: MainFooter },
      meta: { requiresAuth: true },
      props: {
        header: { colorOnScroll: 0 },
        footer: { backgroundColor: 'black' }
      }
    },
    {
      path: '/login',
      name: 'Login',
      components: { default: Login, header: MainNavbar },
      props: {
        header: { colorOnScroll: 400 }
      }
    }
  ],
  scrollBehavior: to => {
    if (to.hash) {
      return { selector: to.hash };
    } else {
      return { x: 0, y: 0 };
    }
  },
});

router.beforeEach((to, from, next) => {
  if (to.matched.some(record => record.meta.requiresAuth)) {
    // this route requires auth, check if logged in
    // if not, redirect to login page.
    if (store.getters["security/isAuthenticated"]) {
      next();
    } else {
      next({
        path: "/login",
        query: { redirect: to.fullPath }
      });
    }
  } else {
    next(); // make sure to always call next()!
  }
});

export default router;

