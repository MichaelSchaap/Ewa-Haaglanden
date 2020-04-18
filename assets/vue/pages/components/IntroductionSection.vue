<template>
<section class="about-us" style="background-color: #FFB300;padding-top:8%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title" style="font-size:50px; color:black;">INTRODUCTIE.</h2>
            <h5 class="description" style="color:black; text-align:left;">
              Het zal u niet zijn ontgaan.
              De arbeidsmarkt is krap. 
              Werkgevers zitten te springen om gekwalificeerd personeel. 
              Zelfs de economische groei loopt terug door een gebrek aan arbeidsaanbod. 
              Terwijl nog steeds veel mensen aan de kant staan. 
              Mensen die graag aan de slag willen om zo hun steentje bij te dragen aan de maatschappij. 
              Het is hoog tijd voor een nieuwe aanpak. Mogen wij aan u voorstellen:
            </h5>
          </div>
        </div>
      </div>
</section>
</template>

<script>

export default {
  name: 'IntroductionSection',
}
</script>

<style lang="scss" scoped>
@import "../../assets/scss/now-ui-kit/mixins.scss";


.about-us{
@include angled-edge('outside bottom', 'lower right', #FFB300);
}
</style>
