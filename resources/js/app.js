/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

 require('./bootstrap');
 import 'flowbite';
 window.Vue = require('vue').default;


 import Vue from 'vue'
 import VueRouter from 'vue-router'
 import App from './App.vue'

 Vue.use(VueRouter)


import VueApexCharts from 'vue-apexcharts'
Vue.use(VueApexCharts)

Vue.component('apexchart', VueApexCharts)
 
 import VueSimpleAlert from "vue-simple-alert";

Vue.use(VueSimpleAlert);

 import { library } from '@fortawesome/fontawesome-svg-core'

/* import specific icons */
import {faEllipsisVertical} from '@fortawesome/free-solid-svg-icons'

import {faAngleDown} from '@fortawesome/free-solid-svg-icons'
import {faThumbsUp} from '@fortawesome/free-solid-svg-icons'
import {faThumbsDown} from '@fortawesome/free-solid-svg-icons'
import {faMagnifyingGlass} from '@fortawesome/free-solid-svg-icons'
import {faEye} from '@fortawesome/free-solid-svg-icons'
import {faLocationDot} from '@fortawesome/free-solid-svg-icons'
import {faXmark} from '@fortawesome/free-solid-svg-icons'
import {faEnvelope} from '@fortawesome/free-solid-svg-icons'
import {faPhone} from '@fortawesome/free-solid-svg-icons'
import {faUser} from '@fortawesome/free-solid-svg-icons'
import {faUserPlus} from '@fortawesome/free-solid-svg-icons'
import {faFacebook} from '@fortawesome/free-brands-svg-icons'
import {faTwitter} from '@fortawesome/free-brands-svg-icons'
import {faInstagram} from '@fortawesome/free-brands-svg-icons'




/* add icons to the library */
library.add(faEllipsisVertical)
library.add(faThumbsDown)
library.add(faThumbsUp)
library.add(faAngleDown)
library.add(faXmark)
library.add(faFacebook)
library.add(faTwitter)
library.add(faInstagram)
library.add(faMagnifyingGlass)
library.add(faUser)
library.add(faUserPlus)
library.add(faEye)
library.add(faLocationDot)
library.add(faEnvelope)
library.add(faPhone)

import moment from 'moment'
/* add font awesome icon component */

import { FontAwesomeIcon } from '@fortawesome/vue-fontawesome'
Vue.component('font-awesome-icon', FontAwesomeIcon)

Vue.filter('formatDate', function(value) {
    if (value) {
      return moment(String(value)).format('DD/MM/YYYY')
    }
  });
 

//   Import all components 
import routes from './routes'
     const router = new VueRouter({
         mode: 'history',
         hash: false,
         routes: routes
         
     })
 
 const app = new Vue({
     el: '#app',
     router,
     render: h => h(App),
 });
 