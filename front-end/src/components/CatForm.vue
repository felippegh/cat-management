<template>
  <b-modal id="my-modal">Hello From My Modal! This is cat {{cat.id}}</b-modal>
</template>

<script>

import Cats from "../api/endpoints/Cats";

export default {
  name: 'CatForm',

  data() {
    return {
      cat: {}
    };
  },

  methods: {
  },

  created() {
  }
}
</script>

<style lang="scss">

</style>
