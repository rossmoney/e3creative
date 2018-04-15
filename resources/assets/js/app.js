
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
var VueResource = require('vue-resource');

Vue.use(VueResource);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.component('price-add', require('./components/PriceAdd.vue'));
Vue.component('price-list', require('./components/PriceList.vue'));

window.addEventListener('load', function () {
    const app = new Vue({
        el: '#app',
        data: {
            globalRefresh: false
        },
        computed: {
            /*compiledMarkdown: function () {
              return marked(this.input, { sanitize: true })
            }*/
        },
        methods: {

        }
    });
});
