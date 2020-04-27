<template>
  <section class="allPartners">
    <div class="container">
      <div class="row">
        <div style="display:block; margin-left:2%;margin-top: 5%">
          <button
            @click="prevPage"
            type="button"
            class="btn btn-secondary"
            :disabled="pageNumber==0"
          >Previous</button>
          <button
            @click="nextPage"
            type="button"
            class="btn btn-secondary"
            :disabled="pageNumber >= pageCount -1"
          >Next</button>

          <input
            type="text"
            placeholder="Vind een partner"
            style="height: 2.4rem"
            v-model="partnerNameSearchString"
          />
        </div>

        <table
          style="display:block; margin-left:2%;"
          class="table table-striped table-hover table-responsive"
        >
          <thead class="thead-dark">
            <tr>
              <th style="width:30%">Naam</th>
              <th style="width:40%">Website</th>
              <th style="width:10%">Date created</th>
              <th style="width:20%">Acties</th>
            </tr>
          </thead>
          <tbody>
            <div v-if="isLoading" class="container" style="margin-top:4%; margin-left:150%">
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
            <tr v-for="partner in paginatedData" v-else :key="partner.id">
              <td style="width:15%">{{partner.name}}</td>
              <td style="width:40%">{{partner.website}}</td>
              <td
                style="width:5%"
              >{{partner.created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10)}}</td>
              <td style="width:40%">
                <button
                  type="button"
                  class="btn btn-danger"
                  style="width:100%"
                  @click="deletePartner(partner.id)"
                >Verwijderen</button>
                <button
                  style="background-color:black;width:100%"
                  type="button"
                  @click="goToPartner(partner.id)"
                  class="btn btn-info"
                >Verander</button>
              </td>
            </tr>
          </tbody>
        </table>
        <div style="display:block;margin-bottom:10%; margin-left:2%;">
          <button
            @click="prevPage"
            type="button"
            class="btn btn-secondary"
            :disabled="pageNumber==0"
          >Previous</button>
          <button
            @click="nextPage"
            type="button"
            class="btn btn-secondary"
            :disabled="pageNumber >= pageCount -1"
          >Next</button>
        </div>
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
  props: {
    size: {
      type: Number,
      required: false,
      default: 10
    }
  },
  data() {
    return {
      id: "",
      name: "",
      website: "",
      img: "",
      pageNumber: 0, // default to page 0
      partnerNameSearchString: ""
    };
  },
  methods: {
    deletePartner(partnerId) {
      let i = this.partners.map(partner => partner.id).indexOf(partnerId);
      this.partners.splice(i, 1);
      this.$store.dispatch("partner/DELETE_PARTNER", {
        partnerId
      });
    },
    goToPartner(partnerId) {
      this.$router.push({
        name: "DashboardEditPartners",
        params: { Pid: partnerId }
      });
    },
    nextPage() {
      this.pageNumber++;
    },
    prevPage() {
      this.pageNumber--;
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
    pageCount() {
      let l = this.partners.length,
        s = this.size;
      return Math.ceil(l / s);
    },
    paginatedData() {
      var partnerNameSearchString = this.partnerNameSearchString;
      partnerNameSearchString = partnerNameSearchString.trim().toLowerCase();
      
      const start = this.pageNumber * this.size,
        end = start + this.size;
      return this.partners
        .slice(start, end)
        .sort(function(a, b) {
          return a.created < b.created ? 1 : -1;
        })
        .filter(function(partners) {
          if (
            partners.name.toLowerCase().indexOf(partnerNameSearchString) !== -1
          ) {
            
            return partners;
          }
        });
    }
  },
  created() {
    this.$store.dispatch("partner/findAll");
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
