/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

import { Form, HasError, AlertError } from 'vform'
window.Form = Form

import Swal from 'sweetalert2'

window.Swal = Swal

window.Fire = new Vue();

import Vue2Editor from 'vue2-editor'

Vue.use(Vue2Editor)

import vSelect from 'vue-select'
import 'vue-select/dist/vue-select.css';

Vue.component('v-select', vSelect);

import ElementUI from 'element-ui'
import 'element-ui/lib/theme-chalk/index.css'
Vue.use(ElementUI);

import { BootstrapVue, IconsPlugin } from 'bootstrap-vue'

// Install BootstrapVue
Vue.use(BootstrapVue)
// Optionally install the BootstrapVue icon components plugin
Vue.use(IconsPlugin)

import VueSlickCarousel from 'vue-slick-carousel'
import 'vue-slick-carousel/dist/vue-slick-carousel.css'
// optional style for arrows & dots
import 'vue-slick-carousel/dist/vue-slick-carousel-theme.css'
Vue.component('VueSlickCarousel',VueSlickCarousel)


Vue.use(require('vue-moment'));
/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

import rolecomponent from './components/Admin/RoleComponent'
import categoriecomponent from './components/Admin/CategorieComponent'
import collection from './components/Admin/Collection'
import users from './components/Admin/Users'
import action_button from './components/Admin/Livres/ActionButton'
import add_livre from './components/Admin/Livres/AddLivre'
import navigation from './components/Front/Navigation/Navigation'
import banniere from './components/Front/Body/Banniere'
import featured from './components/Front/Livres/Featured'
import single_livre from './components/Front/Livres/Single'
import all_livres from './components/Front/Livres/All'
import add_news from './components/Admin/News/Add'
import home_actu from './components/Front/Body/Actualite'
/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

const app = new Vue({
    el: '#app',
    components:{
        rolecomponent,categoriecomponent, collection, users,action_button,add_livre,navigation,banniere,featured, single_livre,all_livres,add_news,home_actu
    }
});
