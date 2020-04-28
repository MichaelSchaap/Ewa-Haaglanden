<template>
  <div class="card" style="margin-right:6%; margin-bottom:5%;">
    <div class="card-body">
      <h5 class="card-title" style="text-size:20px;font-weight:bold">{{ name }}</h5>
      <p
        class="card-text"
        style="color: #b4b4b4;font-size: .895em;"
      >{{ created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10) }}</p>
      
      <p
        class="card-text"
        style="text-size:12px;white-space: pre-line"
      >{{ description }}</p>

      <a :href="require(`../../../../../public/images/doc/${file}`)" download>
   Download
</a>
    </div>
  </div>
</template>

<script>

export default {
  name: "Document",
  props: {
    name: {
      type: String,
      required: true
    },
    description: {
      type: String,
      required: true
    },
    file: {
      type: String,
      required: false
    },
    created: {
      type: String,
      required: true
    }
  },

}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
