<template>
  <form method="post" enctype="multiplart/form-data">
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
                placeholder="Vul in de omschrijving"
                style="margin-bottom:2%;"
              ></textarea>
            </span>
          </div>

          <div class="col-6">
            <input
              class="form-control"
              type="file"
              ref="file"
              name="file"
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
              type="button"
              style="background-color:#CC0029"
              class="btn btn-primary btn-lg btn-round btn-block"
              @click="editDocument()"
            >Veranderen</button>
          </div>
        </div>
      </div>
    </div>
  </form>
</template>

<script>
export default {
  name: "DashboardFormEditDocument",
  methods: {
    async editDocument() {
      this.$store
        .dispatch("document/edit", {
          documentId: this.$route.params.Pid,
          name: this.name,
          description: this.description,
          file: this.file
        })
        .catch(error => {
          console.log(error);
        });
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
  },
  props: {
    name: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    file: {
      type: String,
      required: false
    }
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
