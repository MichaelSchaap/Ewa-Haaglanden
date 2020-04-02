<template>
 <section class="contact text-center" style="background-color: #2c2c2c; color:white;">
      <div class="container">
        <div class="row text-left">
            <div class="col sm-1"></div>
                <div class="col sm-1">
                  <h5 class="title">EWA HAAGLANDEN</h5>
                  <ul class="list-group">
                  <li class="nav-item">
                    <a
                      class="nav-link"
                      href="#/"             
                    >           
                      <p>Home</p>
                    </a>
                  </li>
                  <li class="nav-item" >
                    <a
                      class="nav-link"
                      href="#/informatie"             
                    >           
                      <p>Informatie</p>
                    </a>
                  </li>
                  <li class="nav-item" >
                    <a
                      class="nav-link"
                      href="#/news"             
                    >           
                      <p>Nieuws</p>
                    </a>
                  </li>               
                  </ul>  
                </div>

                <div class="col sm-5" style="padding-bottom:2%">
                  <h5 class="title">CONTACT</h5>
                  <p>Neem vrijblijvend contact met ons op. Als u vragen heeft of graag een afspraak wilt inplannen, dan zien we uw bericht graag tegemoet.</p>
                  <p style="line-height: 0.7;">Aspasialaan 19</p>
                  <p style="line-height: 0.7;">2493 WN Den Haag</p>
                  <p style="line-height: 0.7;">088-6661299</p>
                  <br>
                  <p style="line-height: 0.7;">info@extrastrong.pro</p>
                  <p style="line-height: 0.7;">k.geelen@rocmondriaan.nl</p>
                </div> 
                <div class="col sm-1"></div> 
           
              </div>
        </div>
    </section>
</template>

<script>

export default {
  name: 'HomeContactSection',
}
</script>

<style lang="scss" scoped>

p{
  line-height: 1.4;
  text-transform: lowercase;
  
}
p::first-letter {
  text-transform: capitalize;
}

li {
  list-style-type: none;

}
a {
  padding: 0px;
}


</style>
