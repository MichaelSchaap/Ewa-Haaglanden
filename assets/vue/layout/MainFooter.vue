<template>

    <footer
            class="footer"
            :class="{ [`footer-${type}`]: type }"
            :data-background-color="backgroundColor"
    >
        <div class="container text-left">
              <div class="row">
                <div class="col sm-6">
                  <h5 class="title">Footer Content</h5>
                  <p>Here you can use rows and columns here to organize your footer content.</p>
                </div>
                 <div class="col sm-6">
                  <h5 class="title">Links</h5>
                  <ul>
                    <li class="list-unstyled"><a href="#!">Link 1</a></li>
                    <li class="list-unstyled"><a href="#!">Link 2</a></li>
                    <li class="list-unstyled"><a href="#!">Link 3</a></li>
                    <li class="list-unstyled"><a href="#!">Link 4</a></li>
                  </ul>
                </div>
              </div>
        </div>
            <div class="footer-copyright text-center py-3">
             <div class="container" style="text-align: center;">
            &copy; {{ year }}, ontworpen en gemaakt door studenten van
            <a href="https://www.rocmondriaan.nl" target="_blank" rel="noopener"
            >ROC Mondriaan</a
            >.
        </div>
            </div>
          
    </footer>
</template>
<script>
  export default {
    props: {
      backgroundColor: String,
      type: String
    },
    data() {
      return {
        year: new Date().getFullYear()
      };
    }
  };
</script>

<style lang="scss" scoped>
@import "../assets/scss/now-ui-kit/mixins.scss";


footer{
@include angled-edge('inside top', 'upper left', darkgray);
}
</style>

