<template>
  <div>
    <div class="page-header clear-filter" filter-color="white">
      <parallax
        class="page-header-image"
        style="background-image:url('images/EWAHaaglanden_logo.png'); "
      >
      </parallax>
      <div class="container">
        <div class="content-center brand">

        </div>

      </div>
    </div>
    


      <div class="container text-center" style="margin-bottom:5%">
        <div class="row justify-content-md-center">
          <div class="col-md-12 col-lg-8">
            <h2 class="title" style="color: black; font-size:40px;">OPTIMALISERING AANSLUITING ONDERWIJS / ARBEIDSMARKT IN ZORG & WELZIJN.</h2>
            <h5 class="description" style="color:black;">
Extra strong is een initiatief om de aansluiting van het onderwijs op de arbeidsmarkt in de Zorg & Welzijnssector te optimaliseren. Een samenwerkingsverband om “De Nieuwe Medewerker” te creëren die klaar is voor de arbeidsmarkt van de toekomst. Extra strong is hét platform voor innovatief vakmanschap waar werkgevers, sociale partners, mbo/hbo instellingen elkaar ontmoeten.
            </h5>
          </div>
        </div>
      </div>


    
    <VideoSection></VideoSection>
    <NewsSection></NewsSection>
    <HomeContactSection></HomeContactSection>
    <PartnerSection></PartnerSection>

    
    


  </div>
</template>
<script>
import { Parallax } from '../components';
import VideoSection from '../pages/components/VideoSection';
import PartnerSection from '../pages/components/PartnerSection';
import NewsSection from '../pages/components/NewsSection';
import HomeContactSection from '../pages/components/HomeContactSection';



export default {
  name: 'index',
  bodyClass: 'index-page',
  components: {
    Parallax,
    VideoSection,
    NewsSection,
    HomeContactSection,
    PartnerSection,
  }
};
</script>
<style></style>
