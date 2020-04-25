<template>
  <section class="allContacts">
    <div class="container">
      <div class="row">



        <table
          style="display:block;margin-bottom:10%; margin-left:2%;margin-top: 5%"
          class="table table-striped table-hover table-responsive"
        >
          <thead class="thead-dark">
            <tr>
              <th>Naam</th>
              <th>E-mail</th>
              <th>Created</th>
            </tr>
          </thead>
          <tbody>
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

            <div v-else-if="!hasContacts" class="row" style="margin-left:5%;">No emails!</div>
            <tr v-for="contact in sortFunc()" v-else :key="contact.id">
              <td>{{contact.name}}</td>
              <td>{{contact.email}}</td>
              <td>{{contact.created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10)}}</td>
            </tr>
          </tbody>
        </table>



      </div>
    </div>
  </section>
</template>

<script>
import ErrorMessage from "../../pages/components/ErrorMessage";

export default {
  name: "DashboardContacts",
  components: {
    ErrorMessage
  },
  data() {
    return {
      name: "",
      email: "",
      message: "",
    };
  },
  methods: {
    sortFunc: function() {
      return this.contacts.slice().sort(function(a, b) {
        return a.created < b.created ? 1 : -1;
      });
    },

  },
  computed: {
    isLoading() {
      return this.$store.getters["contact/isLoading"];
    },
    hasError() {
      return this.$store.getters["contact/hasError"];
    },
    error() {
      return this.$store.getters["contact/error"];
    },
    hasContacts() {
      return this.$store.getters["contact/hasContacts"];
    },
    contacts() {
      return this.$store.getters["contact/contacts"];
    },
  },
  created() {
    this.$store.dispatch("contact/findAll");
  }
};
</script>

<style lang="scss" scoped>
.spinner-border {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 70%;
  right: 50%; /* or: left: 50%; */
}


body {
  margin: 0 !important;
}
</style>
