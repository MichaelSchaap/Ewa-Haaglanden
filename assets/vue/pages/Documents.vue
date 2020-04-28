<template>
  <div>
    <IntroductionSection></IntroductionSection>

    <div class="container" style=" margin-top:3%;">
      <div style="display:block;margin-top: 5%">
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

      <div class="row">
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

        <div v-else-if="!hasDocuments" class="row">Geen bestanden!</div>

        <div
          v-for="document in paginatedData"
          v-else
          :key="document.id"
          class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
        >
          <document
            :name="document.name"
            :description="document.description"
            :file="document.file"
            :created="document.created"
          />
        </div>
      </div>

      <div style="display:block;margin-bottom:10%;">
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
</template>
<script>
import IntroductionSection from "../pages/components/IntroductionSection";
import Document from "../pages/components/Document/Document";
import ErrorMessage from "../pages/components/ErrorMessage";

export default {
  name: "Documents",
  components: {
    IntroductionSection,
    Document,
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
      name: "",
      description: "",
      file: "",
      pageNumber: 0 // default to page 0
    };
  },
  methods: {
    nextPage() {
      this.pageNumber++;
    },
    prevPage() {
      this.pageNumber--;
    }
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
    pageCount() {
      let l = this.documents.length,
        s = this.size;
      return Math.ceil(l / s);
    },
    paginatedData() {
      const start = this.pageNumber * this.size,
        end = start + this.size;
      return this.documents.slice(start, end).sort(function(a, b) {
        return a.created < b.created ? 1 : -1;
      });
    }
  },
  created() {
    this.$store.dispatch("document/findAll");
  }
};
</script>

<style lang="scss" scoped>
.spinner-border {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 50%;
  right: 50%; /* or: left: 50%; */
}

@import "../assets/scss/now-ui-kit/mixins.scss";

.about-us {
  @include angled-edge("outside bottom", "lower right", #ffb300);
}
</style>

