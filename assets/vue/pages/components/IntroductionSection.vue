<template>
  <section class="news-intro" style="background-color: #FFB300;padding-top:8%;margin-bottom:10%">
      <div class="container">
        <div class="row">
          <div class="col-md-8 ml-auto mr-auto text-center">
            <h2 class="title" style="color: black; font-size:50px; ">{{ header }}</h2>
          </div>
        </div>
      </div>
    </section>
</template>

<script>
export default {
  name: "IntroductionSection",
  data() {
    return {
      header: "INFORMATIE.",
    };
  },
};
</script>

<style lang="scss" scoped>
@import "../../assets/scss/now-ui-kit/mixins.scss";

.about-us {
  @include angled-edge("outside bottom", "lower right", #ffb300);
}
</style>
