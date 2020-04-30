<template>
  <div class="card" style="margin-right:6%; margin-bottom:5%;">
    <div class="card-body">
      <h5 class="card-title" style="text-size:20px;font-weight:bold">{{ name }}</h5>
      <p
        class="card-text"
        style="color: #b4b4b4;"
      >{{ created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10) }}</p>

      <p class="card-text" style="text-size:12px;white-space: pre-line">{{ description }}</p>
    </div>
    <div v-if="file.length > 6" style="text-align:center;">
      <a :href="require(`../../../../../public/images/doc/${file}`)" download>Download</a>
    </div>
    <div v-else-if="file === null" style="text-align:center;"></div>
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
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}

a {
  background-color: red;
  color: white;
  padding-left: 25%;
  padding-right: 25%;
  padding: 1em 1.5em;
  text-decoration: none;
  text-transform: uppercase;
  -webkit-box-shadow: -2px 18px 18px -4px rgba(0, 0, 0, 0.5);
  -moz-box-shadow: -2px 18px 18px -4px rgba(0, 0, 0, 0.5);
  box-shadow: -2px 18px 18px -4px rgba(0, 0, 0, 0.5);
}
</style>
