<template>
  <div>
      <div class="page-header page-header-small" >
        <parallax
          class="page-header-image"
          style="background-image: url('images/EWAHeader2.png')"
        >
        </parallax>
      <div class="content-center"> 
            <h1 class="title" style="font-size:50px;">Informatie over Ewa Haaglanden</h1>
            <div class="text-center">
              <a href="#" class="btn btn-primary btn-icon btn-round">
                <i class="fab fa-facebook-square"></i>
              </a>
              <a href="#" class="btn btn-primary btn-icon btn-round">
                <i class="fab fa-twitter"></i>
              </a>
              <a href="#" class="btn btn-primary btn-icon btn-round">
                <i class="fab fa-google-plus"></i>
              </a>
            </div>
        </div>
      </div>
 
 <IntroductionSection></IntroductionSection>


    <section class="ewa-for" style="margin-bottom:25px;">
      <div class="container">
          <div class="row">
          <div class="col-md-8 ml-auto mr-auto">
            <h2 class="title" style="font-size:40px; color:black;">Ewa Haaglanden! De noodzakelijke alliantie voor arbeidsparticipatie</h2>
            <h5 class="description" style="color:black; text-align:left">
            Ewa staat voor Entree Wegen naar Arbeid en is tevens straattaal voor ‘Hallo!’. 
            Dat is wat wij zeggen tegen kandidaten en bedrijven in de regio Haaglanden. 
            Ewa is een samenwerkingsverband tussen werkgevers, lokale overheden en het onderwijs. 
            Het doel is de arbeidsparticipatie van jongeren uit de entreeopleiding van ROC Mondriaan, en 
            andere mensen met een afstand tot werk, te bevorderen.           
            De vérgaande samenwerking die wij in Ewa Haaglanden voorstaan is noodzakelijk voor een effectieve aanpak. 
            <br><br>
            De huidige situatie op de arbeidsmarkt is een uitstekende uitgangspositie. 
            Er is sprake van een kwantitatief en kwalitatief probleem: bedrijven hebben 
            veel personeel nodig, maar er kan niet worden voldaan aan de ‘ideale’ match 
            omdat er niet voldoende werknemers zijn die aan de opgegeven wensen van de werkgevers voldoen. 
            <br><br>
            Terwijl dat personeel in potentie wel aanwezig is. 
            Dat zijn namelijk de jonge mensen die de moed hebben om de school weer binnen te stappen. 
            Werknemers binnen bedrijven die verder willen leren. 
            En mensen met een afstand tot werk die weer aan de slag gaan. 
            <br><br>
            We kunnen echter constateren (zonder met de vinger naar één van de betrokkenen te wijzen) dat 
            sommige jongeren nu nog circuleren tussen de school en begeleiding vanuit de gemeente, en niet aan werk komen. 
            Dat er kansen blijven liggen omdat laaggeschoolden in bedrijven nog te weinig verder worden opgeleid. 
            Waarmee ze ook geen plek creëren voor nieuwe collega’s. 
            En dat er nog geen breed opleidingsaanbod beschikbaar is om mensen met een afstand
            tot de arbeidsmarkt in onze regio met behulp van relevante scholing aan het werk te helpen. 
            Dat staat nog in de kinderschoenen. 
            <div class="separator separator-secondary"></div>
            <h2 class="title" style="font-size:40px; color:black;">Het is duidelijk: we kunnen vraag en aanbod alleen in gezamenlijkheid effectief bij elkaar brengen.</h2>

            Wij, partners binnen Ewa Haaglanden, willen daarom sámen jonge mensen zonder 
            diploma begeleiden, opleiden en doorschakelen naar een diploma én een fijne werkplek. 
            We willen kandidaten binnen bedrijven verder opleiden. 
            En we willen kandidaten met relevante scholing dichter bij een baan en participatie brengen. 
           <br><br>
            In ons samenwerkingsverband gaan we daarom de komende jaren, tot en met 2024:
            <br><br>
            <ul class="list-group" style="text-align:left">
            <li class="list-group-item list-group-item-dark">Minimaal 216 jongeren, via een entreeopleiding die plaatsvindt in het bedrijf, een 
            grotere kans bieden op een ononderbroken loopbaan via scholing naar werk</li>
            <li class="list-group-item list-group-item-dark">Minimaal 133 jongeren, voor wie de entreeopleiding te hoog gegrepen is op dat moment in 
            hun leven, zoveel mogelijk scholing meegeven en direct doorschakelen naar werk</li> 
            <li class="list-group-item list-group-item-dark">Minimaal 1692 kandidaten die doorstromen naar niveau 2 een meer arbeidsmarktrelevante leeromgeving bieden</li> 
            <li class="list-group-item list-group-item-dark">Minimaal 47 kandidaten binnen bedrijven relevant verder opleiden</li>
            <li class="list-group-item list-group-item-dark">In een samenwerkingsverband van ROC, gemeenten en betrokken bedrijven één of 
            meerdere certificaten ontwikkelen en uitvoeren voor minimaal 27 laaggeschoolde kandidaten die nog geen onderwijs volgen</li>
            </ul>
            </h5>
          </div>
          </div>
      </div>
        </section>


          

   <TeamSection></TeamSection>
   <ContactUsSection></ContactUsSection>


    </div>



</template>
<script>
import IntroductionSection from '../pages/components/IntroductionSection';
import ContactUsSection from '../pages/components/ContactUsSection';
import TeamSection from '../pages/components/TeamSection';

export default {
  name: 'landing',
   components: {
    ContactUsSection,
    IntroductionSection,
    TeamSection
  }

};
</script>

<style lang="scss" scoped>
@import "../assets/scss/now-ui-kit/mixins.scss";

</style>

