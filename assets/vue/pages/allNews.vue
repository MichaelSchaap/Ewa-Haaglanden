<template>
<section>
  <div class="text-center" style="background-color: #CC0029; margin-top: 5%;padding-bottom: .02%; margin-bottom:5%">
   <h2 class="title" style="color: white; font-size:50px; ">{{ header }}</h2>
  </div>
  <div>
     <div class="container" style=" margin-bottom:5%">
      
       <div 
            class="card" 
            v-for="article in articleData.articles"
            :key="article.title"  
            style="width: 30rem; margin-right:6%; margin-bottom:5%">
        <img 
              class="card-img-top" 
             
              :src="getImgUrl(article.img)"
              alt="Artikel foto">
        <div class="card-body">
          <h5 class="card-title" style="text-size:20px;font-weight:bold" >{{ article.title }}</h5>
          <p class="card-text"><small class="text-muted">{{ article.date }} </small></p>
          <p class="card-text" style="text-size:12px;" >{{ article.content.slice(0, 200) + '...' }}</p>
          <a href="#" class="card-link">Lees meer ></a>
          <div class="container-fluid">
          <div class="row" style="margin-top:3%">
            <p class="card-text"><small class="text-muted">{{ article.category + ' ' + '/' + ' ' + article.reacties + ' ' + 'Reacties'}} </small></p>
          </div>
          </div>
        </div>
      </div>
       </div>
     </div>

  </section>
</template>

<script>
import articleData from "../data/articleData";

export default {
  name: 'allNews',
  data() {
    return {
      articleData,
      header: 'NIEUWS.'
    }
  },
  methods: {
    getImgUrl(img) {
      console.log(img);
      return require('../../../public/images/articleData/' + img );
    }
  }
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}

@import "../assets/scss/now-ui-kit/mixins.scss";


</style>
