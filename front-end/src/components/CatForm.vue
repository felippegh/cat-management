<template>
  <b-modal id="my-modal" title="Edit Cat" ok-title="Save" @ok="submitForm">
    <label for="cat-name">Name:</label>
    <b-form-input id="cat-name" v-model="cat.name" placeholder="Enter the cat name"></b-form-input>
    <br>
    <label for="cat-breed">Breed:</label>
    <b-form-input id="cat-breed" v-model="cat.breed" placeholder="Enter the cat breed"></b-form-input>
    <br>
    <label for="cat-birth">Birthdate:</label>
    <b-form-datepicker id="cat-birth" v-model="cat.birthdate" placeholder="Enter the birthdate"></b-form-datepicker>
    <br>
    <label for="cat-description">Description:</label>
    <b-form-input id="cat-description" v-model="cat.description" placeholder="Enter the cat description"></b-form-input>
    <br>
  </b-modal>
</template>

<script>

import Cats from "../api/endpoints/Cats";

export default {
  name: 'CatForm',

  props: {
    catEdit: Object,
    locationLat: Number,
    locationLon: Number,
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
    locationLat(){
      this.defineLocationLat();
    },
    locationLon(){
      this.defineLocationLon();
    },
  },

  methods: {
    defineCat() {
      if(this.catEdit){
        this.cat = this.catEdit;
      }
    },
    defineLocationLat() {
      if(this.locationLat){
        this.cat.location_lat = this.locationLat;
      }
    },
    defineLocationLon() {
      if(this.locationLon){
        this.cat.location_lon = this.locationLon;
      }
    },
    submitForm() {
      if(this.cat.id){
        return this.updateCat();
      }
      return this.storeCat();
    },
    storeCat() {
      Cats.store(this.cat).then(() => this.catSaved());
    },
    updateCat() {
      Cats.update(this.cat.id, this.cat).then(() => this.catSaved());
    },
    catSaved() {
        this.$swal('Saved!', 'Your cat has been saved.', 'success');
        this.$bvModal.hide("my-modal");
        this.$emit('saved');
    }
  },
}
</script>

<style lang="scss">

</style>
