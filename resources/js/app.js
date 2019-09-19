/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');
import Vuetify from 'vuetify';

import Routes from '@/js/routes.js';

import App from '@/js/views/App';

// Vue.use(Vuetify)

// const routes = [
//     { path: '/', component: require('./components/Home.vue').default },
//     { path: '/post', component: require('./components/Post.vue').default },

//     { path: '/admin', component: require('./components/Admin.vue').default }
// ]

// const router = new VueRouter({ 
//     routes,
//     mode: 'history'
// })

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))

// Vue.component('example-component', require('./components/ExampleComponent.vue').default);

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

// const app = new Vue({
//     el: '#app',
//     router: Routes,
//     render: h => h(App),
// });

const app = new Vue({
    Vuetify,
    router: Routes
}).$mount('#app');


export default app;