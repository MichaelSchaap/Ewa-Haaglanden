<template>
  <div id="app">
    <router-view name="header" />
    <div class="wrapper">
      <router-view />
    </div>
    <router-view name="footer" />
  </div>
</template>
<script>
export default {};
</script>

<style scoped>
#app {
  min-height: calc(100vh - 53px);
}


</style>
