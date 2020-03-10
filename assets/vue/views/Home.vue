<template>
  <div>
    <section id="home">
      <div class="overlay">
        <img
          src="../../../public/images/EWAHeader.jpg"
          class="img-fluid"
          alt="Plaat van EWA Haaglanden"
        >
      </div>
    </section>

    <section
      id="introduction"
      class="jumbotron text-center"
    >
      <div class="overlay">
        <div class="title">
          <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo dolore praesentium, quasi nihil</p>
        </div>
        <div class="explanation">
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quibusdam sunt beatae consectetur corporis expedita obcaecati dolores, consequuntur, praesentium cupiditate sapiente aspernatur est porro soluta molestiae sequi enim! Eius, doloribus vel.</p>
        </div>
      </div>
    </section>
  </div>
</template>

<script>
export default {
  name: "Home"
};
</script>

<style scoped>
.content {
  flex: 1;
}

#introduction {
  background-color: tomato;
}

.title {
  font-size: 1em;
  font-weight: bold;
  font-family: 'Lato', 'HelveticaNeue', 'Helvetica Neue', Helvetica, Arial, sans-serif;
  text-transform: uppercase;
  float: none;
  letter-spacing: 1px;
  line-height: 1.1em;
  text-align: center;

}
</style>