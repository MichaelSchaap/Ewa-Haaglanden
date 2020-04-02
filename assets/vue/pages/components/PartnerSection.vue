<template>
  <div id="PartnerSection" style="">
     <div class="container" style="text-align: center; margin-bottom: 30px;">
          <h2 class="title" style="color: black; font-size:50px;">ONZE PARTNERS.</h2>
      </div>
      <div class="container">
    <infinite-slide-bar :barStyle="{  }" > 
      <img class="img-padding" src="images/logo/1.png">
      <img class="img-padding" src="images/logo/2.png">
      <img class="img-padding" src="images/logo/3.png">
      <img class="img-padding" src="images/logo/4.png">
      <img class="img-padding" src="images/logo/5.png">
      <img class="img-padding" src="images/logo/6.png">
      <img class="img-padding" src="images/logo/7.png">
      <img class="img-padding" src="images/logo/8.png">
      <img class="img-padding" src="images/logo/9.png">
      <img class="img-padding" src="images/logo/10.png">
      <img class="img-padding" src="images/logo/11.png">
      <img class="img-padding" src="images/logo/12.png">
      <img class="img-padding" src="images/logo/13.png">
      <img class="img-padding" src="images/logo/14.png">
      <img class="img-padding" src="images/logo/15.png">
      <img class="img-padding" src="images/logo/16.png">
      <img class="img-padding" src="images/logo/17.png">
      <img class="img-padding" src="images/logo/18.png">
      <img class="img-padding" src="images/logo/19.png">
      <img class="img-padding" src="images/logo/20.png">
      <img class="img-padding" src="images/logo/21.png">
      <img class="img-padding" src="images/logo/22.png">
      <img class="img-padding" src="images/logo/23.png">
      <img class="img-padding" src="images/logo/24.png">
      <img class="img-padding" src="images/logo/25.png">
      <img class="img-padding" src="images/logo/26.png">
      <img class="img-padding" src="images/logo/27.png">
      <img class="img-padding" src="images/logo/29.png"> 
      <img class="img-padding" src="images/logo/30.png">
      <img class="img-padding" src="images/logo/31.png">
      <img class="img-padding" src="images/logo/32.png">
    </infinite-slide-bar>
    </div>
  </div>
</template>

<script>
import infiniteSlideBar from '../../components/partnerSlider'

export default {
  name: 'PartnerSection',
  components: { infiniteSlideBar }
}
</script>

<style>
body {
  margin: 0 !important;
}
.img-padding {
  padding-left: 20px;
}
</style>
