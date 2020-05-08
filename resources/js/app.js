require('./bootstrap');
window.Vue = require('vue');
import VueRouter from 'vue-router';
Vue.use(VueRouter);
import VueAxios from 'vue-axios';
import axios from 'axios'
Vue.use(VueAxios,axios)
import Menu from './Menu.vue'
import Home from './components/HomeComponent.vue'
import Product from './components/ProductComponent.vue'
import User from './components/UserComponent.vue'
import VueSession from 'vue-session'
Vue.use(VueSession)
let r = [
    {path: '/admin', component:Home},
    {path: '/admin/users', component:User},
    {path: '/admin/products', component:Product},
]
let router = new VueRouter({
    routes:r,
    mode:'history'
})
let vm = new Vue(Vue.util.extend({router:router},Menu)).$mount('#app')
