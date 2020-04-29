<template>
  <section class="allDocuments">
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

        <input
            type="text"
            placeholder="Vind een bestand"
            style="height: 2.4rem"
            v-model="documentNaamSearchString"
          />
        </div>

        <table
          style="display:block; margin-left:2%;"
          class="table table-striped table-hover table-responsive"
        >
          <thead class="thead-dark">
            <tr>
              <th style="width:30%">Naam</th>
              <th style="width:30%">Omschrijving</th>
              <th style="width:10%">Date created</th>
              <th style="width:10%">Acties</th>
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

            <div v-else-if="!hasDocuments" class="row" style="margin-left:5%;">Geen bestanden!</div>
            <tr v-for="document in paginatedData" v-else :key="document.id">
              <td style="width:15%">{{document.name}}</td>
              <td style="width:40%;word-wrap: break-word;">{{document.description.slice(0,100)}}</td>
              <td style="width:5%">{{document.created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10)}}</td>
              <td style="width:40%">
                <button
                  type="button"
                  class="btn btn-danger"
                  style="width:100%"
                  @click="deleteDocument(document.id)"
                >Verwijderen</button>
                <button
                  style="background-color:black;width:100%"
                  type="button"
                  @click="goToDocument(document.id)"
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
  name: "DashboardDocuments",
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
      id: "",
      name: "",
      description: "",
      file: "",
      pageNumber: 0,  // default to page 0
      documentNaamSearchString: ""
    };
  },
  methods: {
    deleteDocument(documentId) {
      let i = this.documents.map(document => document.id).indexOf(documentId);
      this.documents.splice(i, 1);
      this.$store.dispatch("document/DELETE_DOCUMENT", {
        documentId
      });
    },
    goToDocument(documentId) {
      this.$router.push({
        name: "DashboardEditDocuments",
        params: { Pid: documentId }
      });
    },
    nextPage(){
        this.pageNumber++;
    },
    prevPage(){
        this.pageNumber--;
    }

  },
  created() {
    this.$store.dispatch("document/findAll");
  },
  computed: {
    isLoading() {
      return this.$store.getters["document/isLoading"];
    },
    hasError() {
      return this.$store.getters["document/hasError"];
    },
    error() {
      return this.$store.getters["document/error"];
    },
    hasDocuments() {
      return this.$store.getters["document/hasDocuments"];
    },
    documents() {
      return this.$store.getters["document/documents"];
    },
    pageCount(){
      let l = this.documents.length,
          s = this.size;
      return Math.ceil(l/s);
    },
    paginatedData() {
      var documentNaamSearchString = this.documentNaamSearchString;
      documentNaamSearchString = documentNaamSearchString.trim().toLowerCase();

      const start = this.pageNumber * this.size,
        end = start + this.size;
      return this.documents
        .filter(function(documents) {
          if (
            documents.name.toLowerCase().indexOf(documentNaamSearchString) !== -1
          ) {
            return documents;
          }
        })
        .sort(function(a, b) {
          return a.created < b.created ? 1 : -1;
        })
        .splice(start, end);
    }
  },
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
