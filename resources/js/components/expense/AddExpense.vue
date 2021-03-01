<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white shadow">
        <i class="fas fa-users"></i> Add Expense
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrap shadow rounded p-3">
            <form enctype="maltipart/form-data" @submit.prevent="addExpense">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="details">Details</label>
                    <textarea
                      name="details"
                      id="details"
                      cols="30"
                      rows="5"
                      class="form-control"
                      v-model="form.details"
                    ></textarea>
                    <small class="text-danger" v-if="errors.details">{{
                      errors.details[0]
                    }}</small>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="amount">Amount</label>
                    <input
                      type="number"
                      name="amount"
                      id="amount"
                      class="form-control"
                      v-model="form.amount"
                    />
                    <small class="text-danger" v-if="errors.amount">{{
                      errors.amount[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="date">Date</label>
                    <input
                      type="date"
                      name="date"
                      id="date"
                      class="form-control"
                      v-model="form.date"
                    />
                    <small class="text-danger" v-if="errors.date">{{
                      errors.date[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <button type="submit" class="form-control btn bg-success">
                Save Expense
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  beforeCreate() {
    if (!User.isLoggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      form: {
        details: "",
        amount: "",
        date: "",
      },
      errors: {},
    };
  },
  methods: {
    addExpense() {
      axios
        .post("/api/expense", this.form)
        .then((response) => {
          this.$router.push({ name: "expense" });
          Sweet.notification("success", "Expense Inserted !");
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
  },
};
</script>

<style>
</style>