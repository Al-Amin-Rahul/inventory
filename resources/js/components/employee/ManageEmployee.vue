<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        All Employees
      </div>
      <div class="card-body">
        <div class="col-lg-6 pl-0 pb-4">
          <input
            type="search"
            class="form-control border border-dark"
            placeholder="Search Employee"
            v-model="searchKey"
          />
        </div>
        <div class="table-responsive">
          <table
            class="table table-bordered"
            id=""
            width="100%"
            cellspacing="0"
          >
            <thead class="bg-info">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Join date</th>
                <th>NID</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Salary</th>
                <th>Join date</th>
                <th>NID</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="employee in filterSearch" :key="employee.id">
                <td>
                  <img :src="employee.image" alt="" width="50px" /><br />
                  {{ employee.name }}
                </td>
                <td>{{ employee.email }}</td>
                <td>{{ employee.address }}</td>
                <td>{{ employee.salary }}</td>
                <td>{{ employee.join_date }}</td>
                <td>{{ employee.nid }}</td>
                <td>
                  <router-link
                    :to="{
                      name: '/edit-employee',
                      params: { id: employee.id },
                    }"
                    class="btn btn-primary"
                    ><i class="fas fa-plus"></i></router-link
                  ><a
                    @click="deleteEmployee(employee.id)"
                    class="btn btn-danger"
                    ><i class="fas fa-trash"></i
                  ></a>
                </td>
              </tr>
            </tbody>
          </table>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    if (!User.isLoggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      employees: [],
      searchKey: "",
    };
  },
  methods: {
    allEmployees() {
      axios
        .get("api/employee/")
        .then((response) => {
          this.employees = response.data;
        })
        .catch();
    },
    deleteEmployee(id) {
      Swal.fire({
        title: "Are you sure?",
        text: "You won't be able to revert this!",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, delete it!",
      }).then((result) => {
        if (result.isConfirmed) {
          axios
            .delete("/api/employee/" + id)
            .then((response) => {
              this.employees = this.employees.filter((employee) => {
                return employee.id != id;
              });
            })
            .catch();
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
  computed: {
    filterSearch() {
      return this.employees.filter((employee) => {
        return employee.email.match(this.searchKey);
      });
    },
  },
  created() {
    this.allEmployees();
  },
};
</script>

<style>
</style>