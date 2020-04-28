<template>
  <section class="createDocument">
    <div class="container h-100" style>
      <div class="row h-100 justify-content-center align-items-center">
        <div style>
          <form method="post" enctype="multipart/form-data">
            <div class="content" style>
              <div class="container" style="width:85%">
                <div class="row">
                  <div class="col-12">
                    <input
                      class="form-control"
                      id="name"
                      v-model="name"
                      type="text"
                      placeholder="Naam"
                      style="margin-bottom:2%;"
                    />
                  </div>
                  <div class="col-6">
                     <span style="white-space: pre;">
                      <textarea
                        class="form-control"
                        id="description"
                        rows="4"
                        cols="80"
                        v-model="description"
                        type="text"
                        placeholder="Vul in de omschrijving van het bestand"
                        style="margin-bottom:2%;"
                      ></textarea>
                    </span>
                  </div>
                  <div class="col-6">
                    <input
                      class="form-control"
                      type="file"
                      ref="files"
                      name="files"
                      style="width:100%;border:none;margin-bottom:2%;padding-left:0px;"
                      @change="onFileSelected"
                      placeholder="Image"
                      accept="
                        application/pdf, 
                        application/x-pdf,
                        application/msword,
                        application/vnd.ms-excel,
                        application/vnd.openxmlformats-officedocument.wordprocessingml.document,
                        application/vnd.openxmlformats-officedocument.spreadsheetml.sheet,
                        application/vnd.openxmlformats-officedocument.presentationml.presentation,
                    "
                  />
                  </div>
                  <div class="col-6">
                  <button
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="goBack()"
                  >Terug</button>
                  </div>
                  <div class="col-6">
                  <button
                    :disabled="name.length === 0 || description.length === 0 || isLoading"
                    type="button"
                    style="background-color:#CC0029"
                    class="btn btn-primary btn-lg btn-round btn-block"
                    @click="createDocument()"
                  >Aanmaken</button>
                  </div>
                </div>
              </div>
            </div>
          </form>

          <br />
        </div>
      </div>
    </div>
  </section>
</template>

<script>
export default {
  name: "DashboardCreateDocument",
  data() {
    return {
      name: "",
      description: "",
      img: null
    };
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
  },
  created() {
    this.$store.dispatch("document/findAll");
  },
  methods: {
    async createDocument() {
      const result = await this.$store.dispatch("document/create", {
        name: this.name,
        description: this.description,
        file: this.file
      });

      if (result !== null) {
        this.$data.name = "";
        this.$data.description = "";
        this.$data.file = null;
      }
      
    },

    goBack() {
        this.$router.push({ path: "/admin/dashboard" });
    },

    onFileSelected(event) {
      let files = event.target.files[0];
      let reader = new FileReader();
      reader.readAsDataURL(files);
      reader.onload = e => {
        this.file = e.target.result;
      };
    }
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
