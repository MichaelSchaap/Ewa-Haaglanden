<template>
    <tr>
        <td>{{title}}</td>
        <td>{{created}}</td>
        <td>{{updated}}</td>
        <td>Edit</td>
    </tr>
</template>

<script>

export default {
  name: 'DashboardPost',
  props: {
    title: {
      type: String,
      required: true
    },
    created: {
      type: String,
      required: true
    },
    updated: {
      type: String,
      required: true
    },
  }
  
}
</script>

<style lang="scss" scoped>
body {
  margin: 0 !important;
}
</style>
