<template>
  <div>
    <div class="card card-login mx-auto mt-5 shadow rounded">
      <div class="card-header">Login</div>
      <div class="card-body">
        <form @submit.prevent="login">
          <div class="form-group">
            <div class="form-label-group">
              <input
                type="email"
                id="inputEmail"
                class="form-control"
                placeholder="Email address"
                required="required"
                autofocus="autofocus"
                v-model="form.email"
              />
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <div class="form-group">
            <div class="form-label-group">
              <input
                type="password"
                id="inputPassword"
                class="form-control"
                placeholder="Password"
                required="required"
                v-model="form.password"
              />
              <label for="inputPassword">Password</label>
            </div>
          </div>
          <button type="submit" class="btn btn-primary btn-block">Login</button>
        </form>
        <div class="text-center">
          <router-link class="d-block small" to="/forget"
            >Forgot Password?</router-link
          >
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    if (User.isLoggedIn()) {
      this.$router.push({ name: "home" });
    }
  },
  data() {
    return {
      form: {
        email: "",
        password: "",
      },
      error: "",
    };
  },
  methods: {
    login() {
      axios
        .post("/api/auth/login", this.form)
        .then((response) => {
          User.responseAfterLogin(response);
          this.$router.push({ name: "home" });
          Sweet.notification("success", "Successfully Logged In !!");
        })
        .catch();
    },
  },
};
</script>

<style>
</style>