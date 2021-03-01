<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        All Expenses
      </div>
      <div class="card-body">
        <div class="col-lg-6 pl-0 pb-4">
          <input
            type="search"
            class="form-control border border-dark"
            placeholder="Search Expense"
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
                <th>Details</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>Details</th>
                <th>Amount</th>
                <th>Date</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="expense in filterSearch" :key="expense.id">
                <td>{{ expense.details }}</td>
                <td>{{ expense.amount }}</td>
                <td>{{ expense.date }}</td>
                <td>
                  <router-link
                    :to="{
                      name: 'edit-expense',
                      params: { id: expense.id },
                    }"
                    class="btn btn-primary"
                    ><i class="fas fa-plus"></i></router-link
                  ><a @click="deleteExpense(expense.id)" class="btn btn-danger"
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
      expenses: [],
      searchKey: "",
    };
  },
  methods: {
    allExpenses() {
      axios
        .get("api/expense/")
        .then((response) => {
          this.expenses = response.data;
        })
        .catch();
    },
    deleteExpense(id) {
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
            .delete("/api/expense/" + id)
            .then((response) => {
              this.expenses = this.expenses.filter((expense) => {
                return expense.id != id;
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
      return this.expenses.filter((expense) => {
        return expense.details.match(this.searchKey);
      });
    },
  },
  created() {
    this.allExpenses();
  },
};
</script>

<style>
</style>