require('./bootstrap');

import Vue from 'vue'
import VueRouter from 'vue-router'

//import route
import {routes} from './routes'

//helper
import User from './Helpers/User'
window.User = User

// swal
import Swal from 'sweetalert2'
window.Swal = Swal

import Sweet from './Helpers/Sweet'
window.Sweet = Sweet

Vue.use(VueRouter)



const router = new VueRouter({
    routes,
    mode:'history'
})

const app = new Vue({
    el: "#app",
    router
})