<template>
  <div>
    <div class="card card-login mx-auto mt-5 shadow rounded">
      <div class="card-header">Forget Password</div>
      <div class="card-body">
        <form>
          <div class="form-group">
            <div class="form-label-group">
              <input
                type="email"
                id="inputEmail"
                class="form-control"
                placeholder="Email address"
                required="required"
                autofocus="autofocus"
              />
              <label for="inputEmail">Email address</label>
            </div>
          </div>
          <a class="btn btn-primary btn-block" href="index.html">Login</a>
        </form>
        <div class="text-center">
          <router-link class="d-block small" to="/">Back To Login</router-link>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {};
</script>

<style>
</style>