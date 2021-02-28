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
    {{-- Suppliers --}}
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
    <li class="nav-item">
      <a class="nav-link" href="charts.html">
        <i class="fas fa-fw fa-chart-area"></i>
        <span>Charts</span></a>
    </li>
    <li class="nav-item">
      <a class="nav-link" href="tables.html">
        <i class="fas fa-fw fa-table"></i>
        <span>Tables</span></a>
    </li>
  </ul>