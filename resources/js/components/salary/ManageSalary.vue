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
                <th>Month</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>Month</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="salary in salaries" :key="salary.month">
                <td>{{ salary.month }}</td>
                <td>
                  <router-link
                    :to="{
                      name: 'view-salary',
                      params: { id: salary.month },
                    }"
                    class="btn btn-primary"
                    >View Salary</router-link
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
    allSalaries() {
      axios
        .get("api/all-salary")
        .then((response) => {
          this.salaries = response.data;
        })
        .catch();
    },
  },
  created() {
    this.allSalaries();
  },
};
</script>

<style>
</style>