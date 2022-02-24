import Vue from 'vue';
import App from './App.vue';

import {
  Menu,
  VTooltip,
} from 'floating-vue';
import 'floating-vue/dist/style.css';
import './styles/custom-tool-tip.css'

import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';

import { BootstrapVue   } from 'bootstrap-vue';
import 'bootstrap/dist/css/bootstrap.css';
import 'bootstrap-vue/dist/bootstrap-vue.css';


Vue.use(VueSweetalert2);

Vue.use(BootstrapVue);

Vue.component('VMenu', Menu);
Vue.directive('tooltip', VTooltip);

Vue.config.productionTip = false;

new Vue({
  render: h => h(App),
}).$mount('#app');
