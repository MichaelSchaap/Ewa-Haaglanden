<template>

    <footer
            class="footer"
            :class="{ [`footer-${type}`]: type }"
            :data-background-color="backgroundColor"
    >
        <div class="container text-center">
              <div class="row">
 
                <div class="col sm-5">
                  <h5 class="title">EWA HAAGLANDEN</h5>
                  <nav-link to="#/">
                   <p> Home </p>
                  </nav-link>
                  <nav-link to="#/landing">
                   <p> Informatie </p>
                  </nav-link>
                  <nav-link to="/">
                   <p> Ontwikkelpad A </p>
                  </nav-link>
                  <nav-link to="/">
                   <p> Ontwikkelpad B </p>
                  </nav-link>
                  <nav-link to="/">
                   <p> Ontwikkelpad C </p>
                  </nav-link>
                    
                </div>
                     
                <div class="col sm-5">
                  <h5 class="title">CONTACT</h5>
                  <p>Neem vrijblijvend contact met ons op. Als u vragen heeft of graag een afspraak wilt inplannen, dan zien we uw bericht graag tegemoet.</p>
                  <p style="line-height: 0.7;">Aspasialaan 19</p>
                  <p style="line-height: 0.7;">2493 WN Den Haag</p>
                  <p style="line-height: 0.7;">088-6661299</p>
                  <br>
                  <p style="line-height: 0.7;">info@extrastrong.pro</p>
                  <p style="line-height: 0.7;">k.geelen@rocmondriaan.nl</p>
                </div>  
           
              </div>
      </div>
            <div class="footer-copyright text-center py-3" style="margin-top:1.5%">
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


p{
  line-height: 1.4;
}
</style>

