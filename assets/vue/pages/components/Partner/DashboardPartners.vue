<template>
  <section class="allPartners">
    <div class="container">
      <div class="row">



        <table
          style="display:block;margin-bottom:10%; margin-left:2%;margin-top: 5%"
          class="table table-striped table-hover table-responsive"
        >
          <thead class="thead-dark">
            <tr>
              <th>Naam</th>
              <th>Website</th>
              <th>Date created</th>
              <th>Acties</th>
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

            <div v-else-if="!hasPartners" class="row" style="margin-left:5%;">No partners!</div>
            <tr v-for="partner in sortFunc()" v-else :key="partner.id">
              <td>{{partner.name}}</td>
              <td>{{partner.website}}</td>
              <td>{{partner.created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10)}}</td>
              <td>
                <button
                  type="button"
                  class="btn btn-danger"
                  @click.prevent="deletePartner(partner.id)"
                >Verwijderen</button>
                <button
                  style="background-color:black;"
                  type="button"
                  @click="goToPartner(partner.id)"
                  class="btn btn-info"
                >Verander</button>
              </td>
            </tr>
          </tbody>
        </table>



      </div>
    </div>
  </section>
</template>

<script>
import ErrorMessage from "../../../pages/components/ErrorMessage";

export default {
  name: "DashboardPartners",
  components: {
    ErrorMessage
  },
  data() {
    return {
      id: "",
      name: "",
      website: "",
      img: "",
    };
  },
  methods: {
    sortFunc: function() {
      return this.partners.slice().sort(function(a, b) {
        return a.created < b.created ? 1 : -1;
      });
    },

    deletePartner(partnerId) {
      this.$store.dispatch("partner/DELETE_PARTNER", {
        partnerId
      });
      this.posts.splice(postId, 1);
      
    },
    goToPartner(partnerId) {
      this.$router.push({ name: "DashboardEditPartners", params: { Pid: partnerId } });
    }

  },
  computed: {
    isLoading() {
      return this.$store.getters["partner/isLoading"];
    },
    hasError() {
      return this.$store.getters["partner/hasError"];
    },
    error() {
      return this.$store.getters["partner/error"];
    },
    hasPartners() {
      return this.$store.getters["partner/hasPartners"];
    },
    partners() {
      return this.$store.getters["partner/partners"];
    },
  },
  created() {
    this.$store.dispatch("partner/findAll");
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
