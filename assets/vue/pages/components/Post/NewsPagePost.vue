<template>
  <div
    id="target"
    class="col-lg-10 col-md-10 col-sm-12 col-xs-12"
    style="margin-top:5%;margin-bottom:5%;"
  >
    <div class="container">
      <img
        class
        style="width:100%;height:auto;"
        :src="require(`../../../../../public/images/news/${img}`)"
        alt="Niews foto"
      />
      <div class>
        <h5 class style="text-size:20px;font-weight:bold">{{ title }}</h5>
        <p
          class="card-text"
          style="color: #b4b4b4;"
        >{{ created.replace(/^(\d+)-(\d+)-(\d+)(.*):\d+$/, '$3/$2/$1$4').slice(0,10) }}</p>
        <p class style="text-size:12px;white-space: pre-line">{{ content}}</p>
        <div class></div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "NewsPagePost",
  props: {
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
  }
};
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}

#target {
  position: relative;
  margin-left: 5%;
}
</style>
