<template>
<section style="background-color: #FFB300">
  <div id="NewsSection" style="margin-top:50px;">
     <div class="container" style="text-align: center">
          <h2 class="title" style="color: black; font-size:50px;">LAATSTE BERICHTEN.</h2>
            <div class="card">
              <img class="card-img" src="images/place.jfif" alt="Artikel foto">
                <div class="card-img-overlay d-flex align-items-center container">
                  <h5 class="card-title text-white" style="text-size:20px;" >ROC Mondriaan's innovatiehuis opent op 21 Mei!</h5>
                </div>
            </div>
     </div>
  </div>
  </section>
</template>

<script>

export default {
  name: 'NewsSection',
}
</script>

<style>
body {
  margin: 0 !important;
}
.card-title {
    position: absolute;
    top: 45%;
    left: 0;
    width: 100%;
    color:black;
}
.card-img-overlay{
   height:100%;
   width: 100%;
   background-color:#000;
   opacity:.6;
}
</style>
