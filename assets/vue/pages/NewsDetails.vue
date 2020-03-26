<template>
<section>

  <div>
     <div class="container" style=" margin-bottom:5%">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
        <div style="margin-right:6%; margin-bottom:5%">
            <h5 class="title" style="text-size:20px;font-weight:bold" >{{ article.title }}</h5>
            <p class="text"><small class="text-muted">{{ article.category }} </small></p>
            <img 
                style="width:100%;height:auto;"
                :src="getImgUrl(article.img)"
                alt="Artikel foto">
            <p class="text" style="text-size:12px;" >{{ article.content }}</p>
            <p class="text"><small class="text-muted">{{ article.date }} </small></p>
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
  name: 'NewsDetails',
  data() {
    return {
      articleData,
    }
  },
  methods: {
    getImgUrl(img) {
      console.log(img);
      return require('../../../public/images/articleData/' + img );
    }
  },
  data: function() {
    return {
      id: this.$route.params.newsId, // this is fine - you can access $route because it's global
      title: "", // empty object or some object type containing placeholder props
      category: "",
      content: "",
      date: "",
      reacties: [],
      img: "",
    };
  },
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
