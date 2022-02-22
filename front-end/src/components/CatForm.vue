<template>
  <b-modal id="my-modal" title="Edit Cat" ok-title="Save" @ok="submitForm">
    <label for="cat-name">Cat Name:</label>
    <b-form-input id="cat-name" v-model="cat.name" placeholder="Enter the cat name"></b-form-input>
    <br>
    <label for="cat-breed">Cat Breed:</label>
    <b-form-input id="cat-breed" v-model="cat.breed" placeholder="Enter the cat breed"></b-form-input>
    <br>
    <label for="cat-birth">Cat Birthdate:</label>
    <b-form-datepicker id="cat-birth" v-model="cat.birthdate" placeholder="Enter the birthdate"></b-form-datepicker>
  </b-modal>
</template>

<script>

import Cats from "../api/endpoints/Cats";

export default {
  name: 'CatForm',

  props: {
    catEdit: {
      type: Object,
    },
  },

  data() {
    return {
      cat: {
        id : null,
        name: null,
        breed: null,
        birthdate: null,
        location_lat: null,
        location_lon: null,
      }
    };
  },

  watch: {
    catEdit(){
      this.defineCat();
    },
  },

  methods: {
    defineCat() {
      if(this.catEdit){
        this.cat = this.catEdit;
      }
    },
    submitForm() {
      if(this.cat.id){
        return this.updateCat();
      }
      return this.storeCat();
    },
    storeCat() {
      Cats.store(this.cat).then()
    },
    updateCat() {
      Cats.update(this.cat.id, this.cat);
    }
  },
}
</script>

<style lang="scss">

</style>
