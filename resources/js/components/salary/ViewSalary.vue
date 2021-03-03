<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        Manage Salary
      </div>
      <div class="card-body">
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
                <th>Month</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>Name</th>
                <th>Month</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="salary in salaries" :key="salary.id">
                <td>{{ salary.employee.name }}</td>
                <td>{{ salary.month }}</td>
                <td>{{ salary.amount }}</td>
                <td>{{ salary.date }}</td>
                <td>
                  <router-link to="" class="btn btn-primary"
                    >Edit Salary</router-link
                  >
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
      salaries: [],
    };
  },
  methods: {
    viewSalaries() {
      let id = this.$route.params.id;
      axios
        .get("/api/view-salary/" + id)
        .then((response) => {
          this.salaries = response.data;
        })
        .catch();
    },
  },
  created() {
    this.viewSalaries();
  },
};
</script>

<style>
</style>