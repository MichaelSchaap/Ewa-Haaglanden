<template>
  <section class="allContacts">
    <div class="container">
      <div class="row">

        <div style="display:block; margin-left:2%;margin-top: 5%">
        <button 
        @click="prevPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber==0"
        >
        Previous
        </button>
        <button 
        @click="nextPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber >= pageCount -1"
        >
        Next
        </button>
        </div>

        <table
          style="display:block; margin-left:2%;"
          class="table table-striped table-hover table-responsive"
        >
          <thead class="thead-dark">
            <tr>
              <th style="width:30%">Naam</th>
              <th style="width:40%">E-mail</th>
              <th style="width:10%">Date created</th>
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
            <tr v-for="contact in paginatedData" v-else :key="contact.id">
              <td style="width:15%">{{contact.name}}</td>
              <td style="width:40%">{{contact.email}}</td>
              <td style="width:5%">{{contact.created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10)}}</td>
            </tr>
          </tbody>
        </table>
        <div style="display:block;margin-bottom:10%; margin-left:2%;">
        <button 
        @click="prevPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber==0"
        >
        Previous
        </button>
        <button 
        @click="nextPage"
        type="button"
        class="btn btn-secondary"
        :disabled="pageNumber >= pageCount -1"
        >
        Next
        </button>
        </div>


      </div>
    </div>
  </section>
</template>

<script>
import ErrorMessage from "../../../pages/components/ErrorMessage";

export default {
  name: "DashboardContacts",
  components: {
    ErrorMessage
  },
  props:{
    size:{
      type:Number,
      required:false,
      default: 10
    }
  },
  data() {
    return {
      name: "",
      email: "",
      message: "",
      pageNumber: 0,  // default to page 0
    };
  },
  methods: {
    nextPage(){
        this.pageNumber++;
    },
    prevPage(){
        this.pageNumber--;
    }

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
    pageCount(){
      let l = this.contacts.length,
          s = this.size;
      return Math.ceil(l/s);
    },
    paginatedData(){
    const start = this.pageNumber * this.size,
          end   = start + this.size;     
    return this.contacts.slice(start, end).sort(function(a, b) {
        return a.created < b.created ? 1 : -1;
      });
    }
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
