let login              =   require('./components/auth/Login.vue').default;
let forget             =   require('./components/auth/Forget.vue').default;
let home               =   require('./components/home/Home.vue').default;
let logout             =   require('./components/auth/Logout').default;
let addEmployee        =   require('./components/employee/AddEmployee').default;
let manageEmployee     =   require('./components/employee/ManageEmployee').default;
let editEmployee       =   require('./components/employee/EditEmployee').default;
let addSuplier         =   require('./components/supplier/AddSuplier').default;
let manageSuplier      =   require('./components/supplier/ManageSuplier').default;
let editSuplier        =   require('./components/supplier/EditSuplier').default;
let addCategory        =   require('./components/category/AddCategory').default;
let manageCategory     =   require('./components/category/ManageCategory').default;
let editCategory       =   require('./components/category/EditCategory').default;
let addProduct         =   require('./components/product/AddProduct').default;
let editProduct        =   require('./components/product/EditProduct').default;
let manageProduct      =   require('./components/product/ManageProduct').default;
let addExpense         =   require('./components/expense/AddExpense').default;
let editExpense        =   require('./components/expense/EditExpense').default;
let manageExpense      =   require('./components/expense/ManageExpense').default;
let addSalary          =   require('./components/salary/AddSalary').default;
let manageSalary       =   require('./components/salary/ManageSalary').default;
let editSalary         =   require('./components/salary/EditSalary').default;
let paySalary          =   require('./components/salary/PaySalary').default;
let viewSalary         =   require('./components/salary/ViewSalary').default;
let stock              =   require('./components/stock/Stock').default;
let editStock          =   require('./components/stock/EditStock').default;

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
    { path: '/add-category', component: addCategory, name: 'add-category' },
    { path: '/category', component: manageCategory, name: 'category' },
    { path: '/edit-category/:id', component: editCategory, name: 'edit-category' },
    { path: '/add-product', component: addProduct, name: 'add-product' },
    { path: '/product', component: manageProduct, name: 'product' },
    { path: '/edit-product/:id', component: editProduct, name: 'edit-product' },
    { path: '/add-expense', component: addExpense, name: 'add-expense' },
    { path: '/expense', component: manageExpense, name: 'expense' },
    { path: '/edit-expense/:id', component: editExpense, name: 'edit-expense' },
    { path: '/add-salary', component: addSalary, name: 'add-salary' },
    { path: '/salary', component: manageSalary, name: 'salary' },
    { path: '/edit-salary/:id', component: editSalary, name: 'edit-salary' },
    { path: '/pay-salary/:id', component: paySalary, name: 'pay-salary' },
    { path: '/view-salary/:id', component: viewSalary, name: 'view-salary' },
    { path: '/stock', component: stock, name: 'stock' },
    { path: '/edit-stock/:id', component: editStock, name: 'edit-stock' },

  ]