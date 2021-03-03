<ul class="sidebar navbar-nav" v-show="$route.path === '/' || $route.path === '/forget' ? false : true">
    {{-- Employees --}}
    <li class="nav-item dropdown">
      <a class="nav-link dropdown-toggle" href="#" id="pagesDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class="fas fa-fw fa-folder"></i>
        <span>Employees</span>
      </a>
      <div class="dropdown-menu" aria-labelledby="pagesDropdown">
        <router-link class="dropdown-item" to="/add-employee">Add Employee</router-link>
        <router-link class="dropdown-item" to="/employee">Manage Employee</router-link>
      </div>
    </li>
    {{-- Suppliers --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Suppliers" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Suplier</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="Suppliers">
          <router-link class="dropdown-item" to="/add-suplier">Add Suplier</router-link>
          <router-link class="dropdown-item" to="/suplier">Manage Supliers</router-link>
        </div>
      </li>
    {{-- Category --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Category" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Category</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="Category">
          <router-link class="dropdown-item" to="/add-category">Add Category</router-link>
          <router-link class="dropdown-item" to="/category">Manage Category</router-link>
        </div>
      </li>
    {{-- Product --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Product" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Product</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="Product">
          <router-link class="dropdown-item" to="/add-product">Add Product</router-link>
          <router-link class="dropdown-item" to="/product">Manage Product</router-link>
        </div>
      </li>
    {{-- Expense --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Expense" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Expense</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="Expense">
          <router-link class="dropdown-item" to="/add-expense">Add Expense</router-link>
          <router-link class="dropdown-item" to="/expense">Manage Expense</router-link>
        </div>
      </li>
    {{-- Salary --}}
    <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="Salary" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          <i class="fas fa-fw fa-folder"></i>
          <span>Salary</span>
        </a>
        <div class="dropdown-menu" aria-labelledby="Expense">
          <router-link class="dropdown-item" to="/add-salary">Add Salary</router-link>
          <router-link class="dropdown-item" to="/salary">Manage Salary</router-link>
        </div>
      </li>
    <li class="nav-item">
      <router-link class="nav-link" to="/stock">
        <i class="fas fa-fw fa-table"></i>
        <span>Stock</span></router-link>
    </li>
  </ul>