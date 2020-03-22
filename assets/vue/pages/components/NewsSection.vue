<template>
<section style="background-color: #CC0029;">
  <div id="NewsSection" style="margin-top:10%;">
     <div class="container" style="text-align: center">
          <h2 class="title" style="color: white; font-size:50px;">{{ header }}</h2>
          
            <div 
            class="card" 
            v-for="article in articleData.articles.slice(0, 6)"
            :key="article.title"  
            style="width: 21rem; margin-right:2%; margin-bottom:2%">
              <img 
              class="card-img" 
              
              height="251px"
              width="190px"
              :src="getImgUrl(article.img)"
              alt="Artikel foto">
                <div class="card-img-overlay d-flex container">
                  <h5 class="card-title text-white" style="text-size:20px;font-weight:bold" >{{ article.title }}</h5>
                  <p class="card-text text-white" style="text-size:12px;font-weight:bold" >{{ article.date }}</p>
                </div>
            </div>

     </div>
  </div>
  </section>
</template>

<script>
import articleData from "../../data/articleData";

export default {
  name: 'NewsSection',
  data() {
    return {
      articleData,
      header: 'LAATSTE BERICHTEN.'
    }
  },
  methods: {
    getImgUrl(img) {
      console.log(img);
      return require('../../../../public/images/articleData/' + img );
    }
  }
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
.card-title {
    position: absolute;
    top: 45%;
    left: 0;
    width: 100%;
    color:black;
}
.card-img-overlay{
   height:100%;
   width: 100%;
   background-color:#000;
   opacity:.6;
}

@import "../../assets/scss/now-ui-kit/mixins.scss";

section{
@include angled-edge('outside top', 'upper left', #CC0029);
}
</style>
