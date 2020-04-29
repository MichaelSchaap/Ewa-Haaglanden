<template>
  <form>
    <div class="content" style="margin-top:15%;">
      <div class="container">
        <div class="col-md-5 ml-auto mr-auto">
          <card type="login" plain>
            <div slot="header" class="logo-container">
              <img v-lazy="'images/EWAHaaglanden.jpg'" alt />
            </div>
            <div class="row">
              <div class="col-12">
                <input
                  class="big_form"
                  v-model="login"
                  type="text"
                  addon-left-icon="now-ui-icons users_circle-08"
                  placeholder="Gebruikersnaam..."
                  style="margin-bottom:5%;width:100%"
                />
              </div>
              <div class="col-12">
                <input
                  class="big_form"
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
                  style="background-color:#CC0029;"
                  class="btn btn-danger"
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

.big_form {
  font-size: 20px;
  height: 56px;
  box-shadow: none;
  display: flex;
  -moz-box-align: center;
  align-items: center;
  width: 100%;
  max-width: 668px;
  position: relative;
  height: 48px;
  border-color: currentcolor currentcolor rgb(102, 102, 102);
  border-bottom-color: rgb(102, 102, 102);
  border-style: none none solid;
  border-width: medium medium 2px;
  border-image: none 100% / 1 / 0 stretch;
  border-radius: 0px;

  font-family: "Exo BNNVARA", Verdana, sans-serif;
  color: rgb(16, 16, 16);
  font-size: 16px;
  text-indent: 17px;
  padding: 3px;
}

.big_form:focus {
  border-bottom-color: rgb(16, 16, 16);
  outline: rgb(1, 186, 239) solid 2px;
  outline-offset: 2px;
}

.big_form:hover,
.big_form:active {
  outline: currentcolor none 0px;
  border-bottom-color: rgb(16, 16, 16);
}

@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro {
  @include angled-edge("outside bottom", "lower right", #cc0029);
}
</style>