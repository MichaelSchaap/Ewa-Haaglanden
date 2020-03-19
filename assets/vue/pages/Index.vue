<template>
  <div>
    <div class="page-header clear-filter" filter-color="white">
      <parallax
        class="page-header-image"
        style="background-image:url('images/EWAHeader2.png')"
      >
      </parallax>
      <div class="container">
        <div class="content-center brand">

        </div>

      </div>
    </div>



    <div class="section">
      <div class="container text-center">
        <div class="row justify-content-md-center">
          <div class="col-md-12 col-lg-8">
            <h2 class="title" style="color: black; font-size:40px;">OPTIMALISERING AANSLUITING ONDERWIJS / ARBEIDSMARKT IN ZORG & WELZIJN.</h2>
            <h5 class="description" style="color:black;">
Extra strong is een initiatief om de aansluiting van het onderwijs op de arbeidsmarkt in de Zorg & Welzijnssector te optimaliseren. Een samenwerkingsverband om “De Nieuwe Medewerker” te creëren die klaar is voor de arbeidsmarkt van de toekomst. Extra strong is hét platform voor innovatief vakmanschap waar werkgevers, sociale partners, mbo/hbo instellingen elkaar ontmoeten.
            </h5>
          </div>
        </div>
      </div>
    </div>

    <VideoSection></VideoSection>
    <PartnerSection></PartnerSection>
    <NewsSection></NewsSection>


  </div>
</template>
<script>
import { Parallax } from '../components';
import VideoSection from '../pages/components/VideoSection';
import PartnerSection from '../pages/components/PartnerSection';
import NewsSection from '../pages/components/NewsSection';



export default {
  name: 'index',
  bodyClass: 'index-page',
  components: {
    Parallax,
    VideoSection,
    PartnerSection,
    NewsSection


  }
};
</script>
<style></style>
