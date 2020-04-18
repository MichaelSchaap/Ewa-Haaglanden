<template>
 <section class="contact" style="margin-bottom:2%;">
      <div class="container">
        <div class="row">
          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12">
        <div class="contactIntro text-center">
        <h2 class="title" style="font-size:40px;">Neem contact met ons op</h2>
        <p class="description" style="color:black; margin-bottom:2.5%">Wij willen graag van je horen</p>
        </div>
        <div class="row">
          <div class="col-lg-12 ml-auto mr-auto col-md-12">
            <div class="form-group row">
            <label for="inputVoornaam" class="col-sm-2 col-form-label">Voornaam</label>
            <div class="col-sm-10">
            <input
              id="inputVoornaam"
              class="form-control"
              placeholder="Voornaam..."
              v-model="form.firstName"
              style="margin-bottom:2%;"
            >
            </div>
            </div>
            <div class="form-group row">
            <label for="inputEmail" class="col-sm-2 col-form-label">E-mail</label>
            <div class="col-sm-10">
            <input
              id="inputEmail"
              class="form-control"
              placeholder="E-mail Hier..."
              v-model="form.email"
              style="margin-bottom:2%;"
            >
            </div>
            </div>
            <div class="form-group row">
            <label for="inputBericht" class="col-sm-2 col-form-label">Bericht</label>
            <div class="col-sm-10">
            <div class="textarea-container">
              <textarea
                id="inputBericht"
                class="form-control"
                name="name"
                rows="4"
                cols="80"
                v-model="form.message"
                placeholder="Schrijf een bericht..."
              ></textarea>
            </div>
            </div>
            </div>
              <button type="submit" style="background-color:#CC0029" class="btn btn-danger">Stuur bericht</button>
          </div>
        </div>
        </div>

          <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" id="subscribeForm">
            <div class="contactIntro text-center">
              <h2 class="title" style="font-size:40px;">Altijd op de hoogte blijven van het laatste nieuws?</h2>
              <p class="description" style="color:black; margin-bottom:2.5%">Meld je dan aan bij onze nieuwsbrief!</p>
            </div>
              <input
              id="inputEmailSub"
              class="big_form"
              placeholder="E-mail Hier..."
              style="margin-bottom:2%;"
            >
              <button type="submit" style="background-color:#CC0029" class="btn btn-danger">Aanmelden</button>

          </div>
        </div>
      </div>




    </section>
</template>

<script>
import { Button } from '../../components';

export default {
  name: 'ContactUsSection',
  components: {
    [Button.name]: Button,
  },
  data() {
    return {
      form: {
        firstName: '',
        email: '',
        message: ''
      }
    };
  }
}
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
  background-color: rgb(245, 245, 245);
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

.big_form:hover, .big_form:active  {
  outline: currentcolor none 0px;
  border-bottom-color: rgb(16, 16, 16);
}





</style>
