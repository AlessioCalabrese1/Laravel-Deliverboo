import Vue from 'vue';
import VueRouter from 'vue-router';

Vue.use(VueRouter);

//importiamo le singole pagine
import Restaurant from './pages/RestaurantGuest';
import Home from './pages/HomeGuest';

const router = new VueRouter({
    mode: 'history',
    routes: [
        {
            path: '/',
            name: 'home',
            component: Home,
        },
        {
            path: '/HomeRestaurant/:id',
            name: 'restaurant',
            component: Restaurant,
        },
    ]
});
export default router