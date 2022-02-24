<template>
  <div>
    <div id="app">
      <div>
        <img id="title" src="./assets/catmon.png">
      </div>
      <div class="cats-map">
        <img v-tooltip="'Click to register your cat!'" @click="openCreateModal" src="./assets/pokemon_map.jpg">
        <VMenu theme="menu" class="cat-icon" v-for="cat in cats" :key="cat.id"
               :style="{ left: cat.location_lat + 'px', top: cat.location_lon + 'px' }">
          <img src="./assets/cat_icon.png">

          <template #popper>
            <div class="balloon">
              Name: {{ cat.name }} <br>
              Breed: {{ cat.breed }} <br>
              Birthdate: {{ cat.birthdate }} <br>
              Description: {{ cat.description }} <br>
              <div class="tooltip-buttons">
                <b-button class="btn" @click="openEditModal(cat)">Edit</b-button>
                <b-button class="btn" @click="deleteCat(cat.id)">Delete</b-button>
              </div>
            </div>
          </template>
        </VMenu>
      </div>
      <cat-form :cat-edit="catEdit" :location-lat="locationLat" :location-lon="locationLon" @saved="loadCats"/>
    </div>
    <footer>
      felippegh.com 2022 🥑
    </footer>
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
      cats: [],
      catEdit: null,
      locationLat: null,
      locationLon: null,
    };
  },

  methods: {
    loadCats() {
      console.log("TEST");
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
    },
    openCreateModal(event) {
      this.locationLat = event.offsetX;
      this.locationLon = event.offsetY;
      this.$bvModal.show("my-modal");
    },
    openEditModal(cat) {
      this.catEdit = cat;
      this.$bvModal.show("my-modal");
    },
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
  background-image: url("./assets/background.png");
  background-color: #000000;
  padding: 1px;
  min-height: 100vh;

  #title {
    margin: 10px 0 10px 0;
    width: 150px;
  }

  .balloon {
    background: red !important;
  }

  .cats-map {
    position: relative;
    max-width: 1280px;
    margin: auto;

    .cat-icon {
      position: absolute;

      img {
        max-width: 20px;
      }
    }
  }
}
  footer {
    text-align: center;
    margin-top: -22px;
    font-weight: bold;
    font-size: small;
  }
</style>
