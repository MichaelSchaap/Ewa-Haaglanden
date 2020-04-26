<template>
  <div
    class="card"
    style="
    margin-right:6%; 
    margin-bottom:5%
    border:0px;; 
    "
  >
    <img
      style="
    width:  auto;
    height: 50px;
    background-size: cover;
    display: block;
    margin-left: auto;
    margin-right: auto;
    margin-top:10%;
    "
      :src="require(`../../../../../public/images/logo/${img}`)"
      alt="Partner logo"
    />
    <div class="card-body">
      <h5
        class="card-title"
        style="text-size:20px;font-weight:bold;text-align:center;"
      >{{ name }}</h5>
      <a
        :href="website"
        target="_blank"
        style="cursor:pointer;text-size:6px;display:inline-block;!text-align:center;"
      >{{ name + "'s" + " " + "website..." }}</a>
    </div>
  </div>
</template>

<script>
export default {
  name: "Partner",
  props: {
    name: {
      type: String,
      required: true
    },
    website: {
      type: String,
      required: true
    },
    img: {
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
</style>
