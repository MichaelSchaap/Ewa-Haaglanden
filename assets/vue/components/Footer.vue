<template>
  <v-footer
    id="sticky-footer"
    height="auto"
    color="indigo"
    dark
  >
    <v-layout
      justify-center
      row
      wrap
    >
      <v-flex
        color="indigo"
        dark
        py-3
        text-xs-center
        white--text
        xs12
      >
        &copy;2020 — <strong>Gemaakt door studenten van ROC Mondriaan</strong>
      </v-flex>
    </v-layout>
  </v-footer>
</template>

<script>

  
export default {
  name: "Footer",
}
</script>

<style scoped>
#sticky-footer {
    flex-shrink: none;
}
</style>