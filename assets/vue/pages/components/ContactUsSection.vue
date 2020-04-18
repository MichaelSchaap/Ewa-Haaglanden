<template>
 <section class="contact text-center" style="margin-bottom:7%;">
      <div class="container">
        <h2 class="title" style="font-size:40px;">Neem contact met ons op</h2>
        <p class="description" style="color:black; margin-bottom:2.5%">Wij willen graag van je horen</p>
        <div class="row">
          <div class="col-lg-6 text-center ml-auto mr-auto col-md-8">
            <input
              class="form-control"
              placeholder="Voornaam..."
              v-model="form.firstName"
              addon-left-icon="now-ui-icons users_circle-08"
              style="width:100%;margin-bottom:2%;"
            >
            <input
              class="form-control"
              placeholder="Email Hier..."
              v-model="form.email"
              addon-left-icon="now-ui-icons ui-1_email-85"
              style="width:100%;margin-bottom:2%;"
            >
            <div class="textarea-container">
              <textarea
                class="form-control"
                name="name"
                rows="4"
                cols="80"
                v-model="form.message"
                placeholder="Schrijf een bericht..."
              ></textarea>
            </div>
            <div class="send-button">
              <n-button type="primary" round block size="lg"
                >Stuur bericht</n-button
              >
            </div>
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




</style>
