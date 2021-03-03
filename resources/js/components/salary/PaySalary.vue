<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white shadow">
        <i class="fas fa-users"></i> Pay Salary
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrap shadow rounded p-3">
            <form enctype="maltipart/form-data" @submit.prevent="paySalary">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Name</label>
                    <input
                      type="text"
                      name="name"
                      id="name"
                      class="form-control"
                      v-model="form.name"
                    />
                    <small class="text-danger" v-if="errors.name">{{
                      errors.name[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="month">Select Month</label>
                    <select
                      name="month"
                      class="form-control"
                      id="month"
                      v-model="form.month"
                    >
                      <option value="January">January</option>
                      <option value="February">February</option>
                      <option value="March">March</option>
                      <option value="April">April</option>
                      <option value="May">May</option>
                      <option value="June">June</option>
                      <option value="July">July</option>
                      <option value="Agust">Agust</option>
                      <option value="September">September</option>
                      <option value="October">October</option>
                      <option value="November">November</option>
                      <option value="December">December</option>
                    </select>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="email">Email</label>
                    <input
                      type="email"
                      name="email"
                      id="email"
                      class="form-control"
                      v-model="form.email"
                    />
                    <small class="text-danger" v-if="errors.email">{{
                      errors.email[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="salary">Salary</label>
                    <input
                      type="number"
                      name="salary"
                      id="salary"
                      class="form-control"
                      v-model="form.salary"
                    />
                    <small class="text-danger" v-if="errors.salary">{{
                      errors.salary[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <button type="submit" class="form-control btn bg-success">
                Pay Salary
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
  created() {
    let id = this.$route.params.id;
    axios
      .get("/api/employee/" + id)
      .then((response) => {
        this.form = response.data;
      })
      .catch();
  },
  data() {
    return {
      form: {
        name: "",
        email: "",
        salary: "",
        month: "",
      },
      errors: {},
    };
  },
  methods: {
    paySalary() {
      let id = this.$route.params.id;
      axios
        .post("/api/store-salary", this.form)
        .then((response) => {
          this.$router.push({ name: "salary" });
          Sweet.notification("success", "Salary Paid !");
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