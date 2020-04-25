<template>
  <section class="contact" style="padding-bottom:2%;background-color: #f6f6f6;">
    <div class="container">
        <div class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
          <div class="contactIntro text-center">
            <h3 class="title" style="font-size:30px;">Wilt u meer weten over Ewa Haaglanden en de mogelijkheden voor uw organisatie?</h3>
            <p
              class="description"
              style="color:black; margin-bottom:2.5%"
            >Neem dan vrijblijvend contact met ons op</p>
          </div>
          <div class="row">
            <div class="col-lg-12 ml-auto mr-auto col-md-12">
              <div class="form-group row">
                <label for="inputVoornaam" class="col-sm-2 col-form-label">Voornaam</label>
                <div class="col-sm-10">
                  <input
                    id="inputVoornaam"
                    class="big_form"
                    placeholder="Voornaam..."
                    v-model="form.firstName"
                    style="margin-bottom:2%;"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
                <div class="col-sm-10">
                  <input
                    id="inputEmail"
                    class="big_form"
                    placeholder="E-mail Hier..."
                    v-model="form.email"
                    style="margin-bottom:2%;"
                  />
                </div>
              </div>
              <div class="form-group row">
                <label for="inputBericht" class="col-sm-2 col-form-label">Bericht</label>
                <div class="col-sm-10">
                  <div class="textarea-container">
                    <textarea
                      id="inputBericht"
                      class="big_form"
                      name="name"
                      rows="4"
                      cols="80"
                      v-model="form.message"
                      placeholder="Schrijf een bericht..."
                    ></textarea>
                  </div>
                </div>
              </div>
              <div class="form-check" style="margin-bottom:2%; margin-top:2%">
                <input type="checkbox" class="form-check-input" id="exampleCheck1">
                <label class="form-check-label" style="margin-top: 2px;" for="exampleCheck1">Meld je aan bij onze nieuwsbrief</label>
              </div>
              <button
                type="submit"
                style="background-color:#CC0029"
                class="btn btn-danger"
              >Stuur bericht</button>
            </div>
          </div>
        </div>
      </div>

     
  </section>
</template>

<script>
import { Button } from "../../components";

export default {
  name: "ContactUsSection",
  components: {
    [Button.name]: Button
  },
  data() {
    return {
      form: {
        firstName: "",
        email: "",
        message: ""
      }
    };
  }
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
