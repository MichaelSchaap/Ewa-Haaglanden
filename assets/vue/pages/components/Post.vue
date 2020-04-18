<template>
       <div 
            class="card" 
            style="margin-right:6%; margin-bottom:5%; "
            > 
        <img 
              class="card-img-top" 
              style="width:100%;height:auto;cursor:pointer;"
              :src="require(`../../../../public/images/news/${img}`)"
              alt="Niews foto">
        <div class="card-body">
          <h5 class="card-title" style="text-size:20px;font-weight:bold" >{{ title }}</h5>
          <p class="card-text"><small class="text-muted">{{ created }} </small></p>
          <p class="card-text" style="text-size:12px;white-space: pre-line" >{{ content.slice(0,200) + '...' }}</p>
          <div class="card-footer">
          
          <p style="cursor:pointer;">Lees meer ></p>
          
          </div>
        </div>
      </div>
      
 

</template>

<script>

export default {
  name: 'Post',
  props: {
    id: {
      type: Number,
      required: true
    },
    title: {
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
    created: {
      type: String,
      required: true
    },
    
  },
  
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
