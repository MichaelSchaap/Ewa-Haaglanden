<template>
    <footer
            class="footer"
            :class="{ [`footer-${type}`]: type }"
            :data-background-color="backgroundColor"
    >
        <div class="container">
            &copy; {{ year }}, ontworpen en gemaakt door studenten van
            <a href="https://www.rocmondriaan.nl" target="_blank" rel="noopener"
            >ROC Mondriaan</a
            >.
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
<style></style>
