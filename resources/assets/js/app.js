
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import coverflow from 'vue-coverflow'

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('example-component', require('./components/ExampleComponent.vue'));
Vue.component('latest-bands', require('./components/LatestBands.vue'));
Vue.component('image-upload', require('./components/ImageUpload.vue'));
Vue.component('image-view', require('./components/ImageView.vue'));
Vue.component('gig-list', require('./components/GigList.vue'));
Vue.component('band-list', require('./components/BandList.vue'));
Vue.component(coverflow.name, coverflow);

const app = new Vue({
    el: '#app'
});
