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

.wrapper{
  display: flex;
  flex-direction: column;
  min-height: 94vh;
}

#app {
  flex: 1;
}
</style>
