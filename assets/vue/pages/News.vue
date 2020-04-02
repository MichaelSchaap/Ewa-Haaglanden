<template>
<section>

  

<section class="news-intro" style="background-color: #FFB300;padding-top:8%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
             <h2 class="title" style="color: black; font-size:50px; ">{{ header }}</h2>
          </div>
        </div>
      </div>
</section>

  <div>
     <div class="container" style=" margin-bottom:5%;color:black;">
      <div class="row">
        
      <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" 
      v-for="article in articleData.articles"
      :key="article.title"
        >
       <div 
            class="card" 
            style="margin-right:6%; margin-bottom:5%"
            
            >
            
        <img 
              class="card-img-top" 
              style="width:100%;height:auto;"
              :src="getImgUrl(article.img)"
              alt="Artikel foto">
        <div class="card-body">
          <h5 class="card-title" style="text-size:20px;font-weight:bold" >{{ article.title }}</h5>
          <p class="card-text"><small class="text-muted">{{ article.date }} </small></p>
          <p class="card-text" style="text-size:12px;" >{{ article.content.slice(0, 200) + '...' }}</p>
          <router-link :to="'/nieuws/' + article.id">
          <a href="#" class="card-link">Lees meer ></a>
          </router-link>
          <div class="container-fluid">
          <div class="row" style="margin-top:3%">
            <p class="card-text"><small class="text-muted">{{ article.category + ' ' + '/' + ' ' + article.reacties + ' ' + 'Reacties'}} </small></p>
          </div>
          </div>
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
  name: 'News',
  data() {
    return {
      articleData,
      header: 'NIEUWS.'
    }
  },
  mounted () {
    axios
      .get('https://api.coindesk.com/v1/bpi/currentprice.json')
      .then(response => (this.info = response))
  },
  methods: {
    getImgUrl(img) {
      console.log(img);
      return require('../../../public/images/articleData/' + img );
    },
  }
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;

}

@import "../assets/scss/now-ui-kit/mixins.scss";

.news-intro{
@include angled-edge('outside bottom', 'lower right', #FFB300);
}

</style>
