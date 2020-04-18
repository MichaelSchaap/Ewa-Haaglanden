<template>
<div class="partners">
    <section class="news-intro" style="background-color: #FFB300;padding-top:8%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
             <h2 class="title" style="color: black; font-size:50px; ">{{ header }}</h2>
          </div>
        </div>
      </div>
</section>
<div class="container">
    <div class="row">
    <div
      v-for="partner in partners"
      :key="partner.id"
      class="col-lg-4 col-md-4 col-sm-12 col-xs-12"
    >

     <div 
        class="card" 
        style="
        margin-right:6%; 
        margin-bottom:5%; 
        "
    > 
        <img 
            style=
            "
            width:  150px;
            height: auto;
            background-size: cover;
            display: block;
            margin-left: auto;
            margin-right: auto;
            margin-top:10%;
            "
            :src="require(`../../../public/images/logo/${partner.img}`)"
            alt="Partner logo">
        <div class="card-body">
            <h5 class="card-title" style="text-size:20px;font-weight:bold;text-align:center;" >{{ partner.name }}</h5>
            <a :href="partner.website" target="_blank" style="cursor:pointer;text-size:6px;display:inline-block;!text-align:center;">Link to website</a>
        </div>
    </div>


    </div>
</div>
</div>
</div>

</template>

<script>

export default {
  name: "Partners",
  data: function() {
    return {
        header: 'PARTNERS.',
        partners: [
        {
        id: 1,
        name: 'ROC Mondriaan',
        website: 'https://rocmondriaan.nl/',
        img: '1.png',
        },
        {
        id: 2,
        name: 'Florein',
        website: 'https://www.florein.nl/',
        img: '2.png',
        },
        {
        id: 3,  
        name: 'Hanos',
        website: 'https://www.hanos.nl/',
        img: '3.png',
        },
        {
        id: 4,  
        name: 'Rabobank Den Haag',
        website: 'https://www.rabobank.nl/lokale-bank/regio-den-haag/',
        img: '4.png',
        },
        {
        id: 5,  
        name: 'Rietbroek',
        website: 'https://www.rietbroek.nl/',
        img: '5.png',
        },
        {
        id: 6,  
        name: 'Gemeente Den Haag',
        website: 'https://www.denhaag.nl/nl.htm',
        img: '6.png',
        },
        {
        id: 7,  
        name: 'Gemeente Delft',
        website: 'https://www.delft.nl/',
        img: '7.png',
        },
        {
        id: 8,  
        name: 'Gemeente Rijswijk',
        website: 'https://www.rijswijk.nl/',
        img: '8.png',
        },
        {
        id: 9,  
        name: 'Gemeente Westland',
        website: 'https://www.gemeentewestland.nl/',
        img: '9.png',
        },
        {
        id: 10,  
        name: 'UWV ',
        website: 'https://www.uwv.nl/zakelijk/index.aspx',
        img: '10.png',
        },
        {
        id: 11,  
        name: 'Patijnenburg',
        website: 'https://www.patijnenburg.nl/',
        img: '11.png',
        },
        {
        id: 12,  
        name: 'Werkse!',
        website: 'https://www.werkse.nl/',
        img: '12.png',
        },
        {
        id: 13,  
        name: 'WSP Haaglanden',
        website: 'https://wsphaaglanden.nl/',
        img: '13.png',
        },
        {
        id: 14,  
        name: 'WSP Rijswijk',
        website: 'https://www.wsprijswijk.nl/',
        img: '14.png',
        },
        {
        id: 15,  
        name: 'Fonds 1818',
        website: 'https://www.fonds1818.nl/',
        img: '15.png',
        },
        {
        id: 16,  
        name: 'Leger des Heils',
        website: 'https://www.legerdesheils.nl/',
        img: '16.png',
        },
        {
        id: 17,  
        name: 'LerenDoen',
        website: 'https://lerendoen.org/',
        img: '17.png',
        },
        {
        id: 18,  
        name: 'Menskracht7',
        website: 'https://www.menskracht7.nl/',
        img: '18.png',
        },
        {
        id: 19,  
        name: 'Energieacademie',
        website: 'http://www.haagseenergieacademie.nl/',
        img: '19.png',
        },
        {
        id: 20,  
        name: 'Schroeder van der Kolk',
        website: 'https://www.schroeder.nl/',
        img: '20.png',
        },
        {
        id: 21,  
        name: 'Randstad participatie',
        website: 'https://www.randstad.nl/werknemers/diensten/participatie',
        img: '21.png',
        },
        {
        id: 22,  
        name: 'Opwerk',
        website: 'https://www.opwerk-intermediair.nl/',
        img: '22.png',
        },
        {
        id: 23,  
        name: 'Juliana Plaza',
        website: 'http://www.julianaplaza.nl/',
        img: '23.png',
        },
        {
        id: 24,  
        name: 'mboRijnland',
        website: 'https://mborijnland.nl/',
        img: '24.png',
        },
        {
        id: 25,  
        name: 'Scholengroep Johan de Witt',
        website: 'https://www.johandewittscholengroep.nl/',
        img: '25.png',
        },
        {
        id: 26,  
        name: 'De Einder',
        website: 'https://www.de-einder.nl/',
        img: '26.png',
        },
        {
        id: 27,  
        name: 'De Poort',
        website: 'https://www.prodepoort.nl/',
        img: '27.png',
        },
        {
        id: 28,  
        name: 'Hofstede College',
        website: 'https://hofstedecollege.nl/ons-college/examens-mbo/',
        img: '28.png',
        },
        {
        id: 29,  
        name: 'Esloo College',
        website: 'https://www.esloocollege.nl/',
        img: '29.png',
        },
        {
        id: 30,  
        name: 'Stanislas College',
        website: 'https://www.stanislascollege.nl/',
        img: '30.png',
        },
        {
        id: 31,  
        name: 'Grotius College',
        website: 'https://www.grotiuscollege.nl/',
        img: '31.png',
        },
        {
        id: 32,  
        name: 'Sbb',
        website: 'https://www.s-bb.nl/',
        img: '32.png',
        },

    ]
  };
}


}
</script>

<style lang="scss" scoped>

.spinner-border {
  display: block;
  position: fixed;
  z-index: 1031;
  top: 60%;
  right: 50%; /* or: left: 50%; */

}



@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro{
@include angled-edge('outside bottom', 'lower right', #FFB300);
}
</style>