<template>
  <div id="app">
    <div class="cats-map">
      <img v-tooltip="'Click to add a cat!'" @click="testClick" src="./assets/pokemon_map.jpg">
      <VMenu class="cat-icon" v-for="cat in cats" :key="cat.id"
             :style="{ left: cat.location_lat + 'px', top: cat.location_lon + 'px' }">
        <img src="./assets/cat_icon.png">

        <template #popper>
          Name: {{ cat.name }} <br>
          Breed: {{ cat.breed }} <br>
          Birthdate: {{ cat.birthdate }} <br>
          <b-button v-b-modal="'my-modal'">Edit</b-button>
          <button @click="deleteCat(cat.id)">Delete</button>
        </template>
      </VMenu>
    </div>
    <cat-form/>
  </div>
</template>

<script>

import Cats from "./api/endpoints/Cats";
import CatForm from "./components/CatForm";

export default {
  name: 'App',

  components: {
    CatForm,
  },

  data() {
    return {
      cats: []
    };
  },

  methods: {
    testClick(event) {
      console.log(event.offsetX, event.offsetY);
    },
    loadCats() {
      Cats.index().then(response => {
        this.cats = response.data;
      })
    },
    deleteCat(cat) {
      this.$swal({
        title: 'Are you sure?',
        text: "You won't be able to revert this!",
        icon: 'warning',
        showCancelButton: true,
        confirmButtonColor: '#3085d6',
        cancelButtonColor: '#d33',
        confirmButtonText: 'Yes, delete it!'
      }).then((result) => {
        if (result.isConfirmed) {
          Cats.destroy(cat).then(response => {
            this.$swal(
                'Deleted!',
                'Your cat has been deleted.',
                'success'
            )
            console.log(response);
            this.loadCats();
          })
        }
      })
    }
  },

  created() {
    this.loadCats();
  }
}
</script>

<style lang="scss">

#app {
  font-family: Avenir, Helvetica, Arial, sans-serif;
  -webkit-font-smoothing: antialiased;
  -moz-osx-font-smoothing: grayscale;
  text-align: center;
  color: #2c3e50;
  margin-top: 60px;

  .cats-map {
    position: relative;
    max-width: 1280px;
    margin: auto;
    background: yellow;

    .cat-icon {
      position: absolute;

      img {
        max-width: 20px;
      }
    }
  }
}
</style>
