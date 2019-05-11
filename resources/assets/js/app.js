
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');
import store from './vuex/store.js'

window.Vue = require('vue');

Vue.component('notifications', require('./components/notifications/Notifications.vue').default)
Vue.component('notification', require('./components/notifications/Notification.vue').default)
//Vue.component('example-component', require('./components/ExampleComponent.vue').default);

const app = new Vue({
    store,
    el: '#app'
});
