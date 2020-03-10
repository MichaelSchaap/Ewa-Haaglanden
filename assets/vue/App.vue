<template>
  <div class="layout">
    <Navigation />
    <Footer />
  </div>
</template>

<script>
import Navigation from './components/Navigation.vue'
import Footer from './components/Footer.vue'
  
export default {
  name: "App",
  components: {
    Navigation,
    Footer
  }
}
</script>

<style scoped>
.layout {
  display: flex;
  flex-direction: column;
  justify-content: space-between;
  align-items: center;
  min-height: 100vh;
}
</style>