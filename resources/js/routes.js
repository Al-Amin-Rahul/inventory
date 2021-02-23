let login    =   require('./components/auth/Login.vue').default;
let forget   =   require('./components/auth/Forget.vue').default;
let home     =   require('./components/home/Home.vue').default;

export const routes = [
    { path: '/', component: login, name: '/' },
    { path: '/forget', component: forget, name: 'forget' },
    { path: '/home', component: home, name: 'home' },
  ]