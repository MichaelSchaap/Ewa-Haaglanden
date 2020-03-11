<template>
  <div>
    <section id="home">
      <div class="overlay">
        <img
          src="../../../public/images/EWAHeader.jpg"
          class="img-fluid"
          alt="Plaat van EWA Haaglanden"
        >
      </div>
    </section>

    <section
      id="introduction"
      class="jumbotron text-center"
    >
      <div class="overlay">
        <div class="row">
          <div class="col-2" />
          <div class="col-8">
            <div class="title">
              <p>OPTIMALISERING AANSLUITING ONDERWIJS / ARBEIDSMARKT IN ZORG & WELZIJN.</p>
            </div>
          </div>
          <div class="col-2" />
        </div>
        <div class="row">
          <div class="col-3" />
          <div class="col-6">
            <div class="explanation">
              <p>Extra strong is een initiatief om de aansluiting van het onderwijs op de arbeidsmarkt in de Zorg & Welzijnssector te optimaliseren. Een samenwerkingsverband om “De Nieuwe Medewerker” te creëren die klaar is voor de arbeidsmarkt van de toekomst. Extra strong is hét platform voor innovatief vakmanschap waar werkgevers, sociale partners, mbo/hbo instellingen elkaar ontmoeten</p>
            </div>
          </div>
          <div class="col-3" />
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Home"
};
</script>

<style scoped>
.content {
  flex: 1;
}

#introduction {
  background-color: white;
  text-align: center;
}

.title {
  font-size: 2.0em;
  font-weight: bold;
  font-family: "Didact Gothic";
  text-transform: uppercase;
  float: none;
  letter-spacing: 1px;
  line-height: 1.1em;
  text-align: center;

}

.explanation {

}
</style>