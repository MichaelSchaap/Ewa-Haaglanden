<template>
  <form>
    <div class="content" style="margin-top:15%">
      <div class="container">
        <div class="col-md-5 ml-auto mr-auto">
          <card type="login" plain>
            <div slot="header" class="logo-container">
              <img v-lazy="'images/EWAHaaglanden.jpg'" alt />
            </div>
            <div class="row">
              <div class="col-12">
                <input
                  class="no-border input-lg"
                  v-model="login"
                  type="text"
                  addon-left-icon="now-ui-icons users_circle-08"
                  placeholder="Gebruikersnaam..."
                  style="margin-bottom:5%;width:100%"
                />
              </div>
              <div class="col-12">
                <input
                  class="no-border input-lg"
                  v-model="password"
                  type="password"
                  addon-left-icon="now-ui-icons text_caps-small"
                  placeholder="Wachtwoord..."
                  style="width:100%"
                />
              </div>
            </div>

            <template slot="raw-content">
              <div class="card-footer text-center">
                <button
                  :disabled="login.length === 0 || password.length === 0 || isLoading"
                  type="button"
                  class="btn btn-primary btn-lg btn-round btn-block"
                  @click="performLogin()"
                >Login</button>
              </div>
            </template>
          </card>

          <div v-if="isLoading" class="container">
            <div class="spinner-border" role="status">
              <span class="sr-only">Loading...</span>
            </div>
          </div>

          <div v-else-if="hasError" class="row">
            <div class="alert alert-danger" role="alert">
              <error-message :error="error" />
            </div>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
import { Button } from "../components";
import Card from "../components/Cards/Card";
import ErrorMessage from "../pages/components//ErrorMessage";

export default {
  name: "Login",
  components: {
    Card,
    [Button.name]: Button,
    ErrorMessage
  },
  data() {
    return {
      login: "",
      password: "",
      header: "LOGIN."
    };
  },
  computed: {
    isLoading() {
      return this.$store.getters["security/isLoading"];
    },
    hasError() {
      return this.$store.getters["security/hasError"];
    },
    error() {
      return this.$store.getters["security/error"];
    }
  },
  created() {
    let redirect = this.$route.query.redirect;

    if (this.$store.getters["security/isAuthenticated"]) {
      if (typeof redirect !== "undefined") {
        this.$router.push({ path: redirect });
      } else {
        this.$router.push({ path: "/home" });
      }
    }
  },
  methods: {
    async performLogin() {
      let payload = { login: this.$data.login, password: this.$data.password },
        redirect = this.$route.query.redirect;

      await this.$store.dispatch("security/login", payload);
      if (!this.$store.getters["security/hasError"]) {
        if (typeof redirect !== "undefined") {
          this.$router.push({ path: redirect });
        } else {
          this.$router.push({ path: "/home" });
        }
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.spinner-border {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 60%;
  right: 50%; /* or: left: 50%; */
}

.content {
}

@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro {
  @include angled-edge("outside bottom", "lower right", #cc0029);
}
</style>