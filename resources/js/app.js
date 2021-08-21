require('./bootstrap');

window.Vue = require('vue').default;

Vue.component('example-component', require('./components/ExampleComponent.vue').default);
Vue.component('front-items', require('./components/store/frontItems.vue').default);
Vue.component('category-items', require('./components/store/categoryItems.vue').default);
Vue.component('item-info', require('./components/store/itemInfo.vue').default);
Vue.component('best-items', require('./components/store/bestItems.vue').default);
Vue.component('category-bests', require('./components/store/categoryBests.vue').default);
Vue.component('user-orders', require('./components/store/userOrders.vue').default);
Vue.component('orders-count', require('./components/store/ordersCount.vue').default);
// Vue.component('store-footer', require('./components/store/storeFooter.vue').default);


Vue.component('contact-us', require('./components/contactUs.vue').default);
Vue.component('home-stores', require('./components/homeStores.vue').default);
Vue.component('home-careers', require('./components/homeCareers.vue').default);

const lang = localStorage.getItem('lang') || 'en' ;
axios.defaults.baseURL = 'http://xdealer.net';
axios.defaults.headers['Accept-Language'] = lang;


const app = new Vue({
    el: '#app',
    data() {
        return {
            locale: 'en',
            lang: {},
            text: 'qweq',
        }
    },
    methods: {
        getlang() {

        }
    },
});
