let login    =   require('./components/auth/Login.vue').default;
let forget   =   require('./components/auth/Forget.vue').default;
let home     =   require('./components/home/Home.vue').default;
let logout     =   require('./components/auth/Logout').default;
let addEmployee     =   require('./components/employee/AddEmployee').default;

export const routes = [
    { path: '/', component: login, name: '/' },
    { path: '/forget', component: forget, name: 'forget' },
    { path: '/home', component: home, name: 'home' },
    { path: '/logout', component: logout, name: 'logout' },
    { path: '/add-employee', component: addEmployee, name: '/add-employee' },
  ]