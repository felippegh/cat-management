<template>
  <div id="app" >
    <img @click="testClick" alt="Pokémon Map" src="./assets/pokemon_map.jpg">
  </div>
</template>

<script>

import Cats from "./api/endpoints/Cats";

export default {
  name: 'App',

  methods: {
    testClick(event) {
      console.log(event.offsetX, event.offsetY);
    }
  },

  created() {
    Cats.index().then(response => {
      console.log(response);
    })
  }

}
</script>

<style>
#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;
}
</style>
