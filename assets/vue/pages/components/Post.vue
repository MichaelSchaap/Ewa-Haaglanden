<template>
<section>

  <div>
     <div class="container" style=" margin-bottom:5%">
      <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-12 col-xs-12" >
        <div style="margin-right:6%; margin-bottom:5%">
            <h5 class="title" style="text-size:20px;font-weight:bold" >{{ title }}</h5>
            <p class="text"><small class="text-muted">{{ category }} </small></p>
            <img 
                style="width:100%;height:auto;"
                alt="Artikel foto"
                >  {{ img }}
                
                
            <p class="text" style="text-size:12px;" >{{ content }}</p>
            <p class="text"><small class="text-muted">{{ date }} </small></p>
            </div>
        </div>
      </div>
     </div>
    </div>

  </section>
</template>

<script>

export default {
  name: 'Post',
  props: {
    title: {
      type: String,
      required: true
    },
    category: {
      type: String,
      required: true
    },
    content: {
      type: String,
      required: true
    },
    img: {
      type: String,
      required: true
    },
  }
  
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
