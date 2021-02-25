<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        All Employees
      </div>
      <div class="card-body">
        <div class="table-responsive">
          <table
            class="table table-bordered"
            id="dataTable"
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
              <tr v-for="employee in employees" :key="employee.id">
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
                  <router-link to="" class="btn btn-primary"
                    ><i class="fas fa-plus"></i></router-link
                  ><router-link to="" class="btn btn-danger"
                    ><i class="fas fa-trash"></i
                  ></router-link>
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
      employees: {},
    };
  },
  methods: {
    allEmployees() {
      axios
        .get("api/employee/")
        .then((response) => {
          this.employees = response.data;
          console.log(response.data);
        })
        .catch();
    },
  },
  created() {
    this.allEmployees();
  },
};
</script>

<style>
.odd {
  display: none !important;
}
</style>