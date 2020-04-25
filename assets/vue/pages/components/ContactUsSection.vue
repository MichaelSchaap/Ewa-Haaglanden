<template>
  <section class="createContact" style="padding-bottom:2%;background-color: #f6f6f6;">
    <div class="container" style="text-align: center">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="contactIntro text-center">
            <h3 class="title" style="font-size:30px;">Wilt u meer weten over Ewa Haaglanden en de mogelijkheden voor uw organisatie?</h3>
            <p
              class="description"
              style="color:black; margin-bottom:2.5%"
            >Neem dan vrijblijvend contact met ons op</p>
          </div>
          <div v-if="isLoading" class="container">
              <div class="spinner-border" role="status">
                <span class="sr-only">Loading...</span>
              </div>
          </div>
          <form method="post" v-else enctype="multiplart/form-data">
          <div class="row">
            <div class="col-lg-12 ml-auto mr-auto col-md-12">
              <div class="row">
                
                <label for="name" class="col-sm-2 col-form-label">Naam</label>
                <div class="col-sm-10">
                  <input
                    id="name"
                    class="big_form"
                    placeholder="Naam..."
                    v-model="name"
                    type="text"
                    style="margin-bottom:2%;"
                  />
                </div>
              </div>
              <div class="row">
                <label for="email" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input
                    id="email"
                    class="big_form"
                    placeholder="E-mail Hier..."
                    v-model="email"
                    type="text"
                    style="margin-bottom:2%;"
                  />
                </div>
              </div>
              <div class="row">
                <label for="subject" class="col-sm-2 col-form-label">Titel</label>
                <div class="col-sm-10">
                  <input
                    id="subject"
                    class="big_form"
                    placeholder="Titel Hier..."
                    v-model="subject"
                    type="text"
                    style="margin-bottom:2%;"
                  />
                </div>
              </div>
              <div class="row">
                <label for="message" class="col-sm-2 col-form-label">Bericht</label>
                <div class="col-sm-10">
                  <div class="textarea-container">
                    <textarea
                      id="message"
                      class="big_form"
                      name="name"
                      rows="4"
                      cols="80"
                      v-model="message"
                      type="text"
                      placeholder="Schrijf een bericht..."
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="form-check" style="margin-bottom:2%; margin-top:2%">
                <input type="checkbox" v-model="subscribed" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" style="margin-top: 2px;" for="exampleCheck1">Meld je aan bij onze nieuwsbrief</label>
              </div>
              <button
                :disabled="email.length === 0 || subject.length === 0 || name.length === 0 || message.length === 0"
                type="button"
                style="background-color:#CC0029"
                class="btn btn-danger"
                @click="createContact()"
              >Stuur bericht</button>
            </div>
          </div>
          </form>
        </div>
      </div>

     
  </section>
</template>

<script>

export default {
  name: "ContactUsSection",
  data() {
    return {
        name: "",
        email: "",
        subject: "",
        message: "",
        subscribed: false
    };
  },
  methods: {
    async createContact() {
      const result = await this.$store.dispatch("contact/create", {
        name: this.name,
        email: this.email,
        subject: this.subject,
        message: this.message,
        subscribed: this.subscribed
      });

      if (result !== null) {
        this.$data.name = "";
        this.$data.email = "";
        this.$data.subject = "";
        this.$data.message = "";
        this.$data.subscribed = false;
      }
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
  },
  created() {
    this.$store.dispatch("contact/findAll");
  },
};
</script>

<style lang="scss" scoped>


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
</style>
