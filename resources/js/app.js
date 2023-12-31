require('./bootstrap');
import vue from 'vue'
window.Vue = vue;

import App from './components/App.vue';
// import App from './components/user-management/Login.vue';
import VueRouter from 'vue-router';
import VueAxios from 'vue-axios';
import axios from 'axios';
import { routes } from './routes';

Vue.use(VueRouter);
Vue.use(VueAxios, axios);

const router = new VueRouter({
    mode: 'history',
    routes: routes,
    duplicateNavigationPolicy: 'ignore'
});

const app = new Vue({
    el: '#app',
    router: router,
    render: h => h(App),
});