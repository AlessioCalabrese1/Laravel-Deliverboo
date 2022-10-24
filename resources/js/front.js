window.Vue = require('vue');

import App from './views/App';
import VueRouter from 'vue-router';
import VueBraintree from 'vue-braintree';

Vue.use(VueRouter);
Vue.use(VueBraintree);

import router from './router';

const app = new Vue({
    el: '#root',
    render: h => h(App),
    router
})


//Importazione di Sweetalert
import Vue from 'vue';
import VueSweetalert2 from 'vue-sweetalert2';

//Style import di Sweetalert, senza questo non si vedono bene i pop up
import 'sweetalert2/dist/sweetalert2.min.css';

Vue.use(VueSweetalert2);
