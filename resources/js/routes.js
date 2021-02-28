let login              =   require('./components/auth/Login.vue').default;
let forget             =   require('./components/auth/Forget.vue').default;
let home               =   require('./components/home/Home.vue').default;
let logout             =   require('./components/auth/Logout').default;
let addEmployee        =   require('./components/employee/AddEmployee').default;
let manageEmployee     =   require('./components/employee/ManageEmployee').default;
let editEmployee       =   require('./components/employee/EditEmployee').default;
let addSuplier        =   require('./components/supplier/AddSuplier').default;
let manageSuplier     =   require('./components/supplier/ManageSuplier').default;
let editSuplier       =   require('./components/supplier/EditSuplier').default;

export const routes = [
    { path: '/', component: login, name: '/' },
    { path: '/forget', component: forget, name: 'forget' },
    { path: '/home', component: home, name: 'home' },
    { path: '/logout', component: logout, name: 'logout' },
    { path: '/add-employee', component: addEmployee, name: 'add-employee' },
    { path: '/employee', component: manageEmployee, name: 'employee' },
    { path: '/edit-employee/:id', component: editEmployee, name: 'edit-employee' },
    { path: '/add-suplier', component: addSuplier, name: 'add-suplier' },
    { path: '/suplier', component: manageSuplier, name: 'suplier' },
    { path: '/edit-suplier/:id', component: editSuplier, name: 'edit-suplier' },

  ]