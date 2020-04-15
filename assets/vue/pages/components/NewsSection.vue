<template>
<section style="background-color: #CC0029;">
  <div id="NewsSection" style=";padding-bottom:5%">
     <div class="container" style="text-align: center">
          <h2 class="title" style="color: white; font-size:50px;">{{ header }}</h2>
          
            <div 
            class="card" 
            v-for="post in posts.slice(0, 6)"
            :key="post.id"  
            style="width: 21rem; margin-right:2%; margin-bottom:2%">
              <img 
              class="card-img" 
              :src="require(`../../../../public/images/news/${post.img}`)"
              height="251px"
              width="190px"
              
              alt="Artikel foto">
                <div class="card-img-overlay d-flex container">
                  <h5 class="card-title text-white" style="text-size:20px;font-weight:bold" >{{ post.title}}</h5>
                  <p class="card-text text-white" style="text-size:12px;font-weight:bold" >{{ post.created }}</p>
                </div>
            </div>

     </div>
  </div>
  </section>
</template>

<script>

export default {
  name: 'NewsSection',
  data() {
    return {
      title: "",
      img: "",
      header: 'LAATSTE BERICHTEN.'
    }
  },
  computed: {
    isLoading() {
      return this.$store.getters["post/isLoading"];
    },
    hasError() {
      return this.$store.getters["post/hasError"];
    },
    error() {
      return this.$store.getters["post/error"];
    },
    hasPosts() {
      return this.$store.getters["post/hasPosts"];
    },
    posts() {
      return this.$store.getters["post/posts"];
    }
  },
   created() {
    this.$store.dispatch("post/findAll");
  },
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


</style>
