<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white">Add Category</div>
      <div class="row">
        <div class="col-lg-12">
          <form @submit.prevent="addCategory">
            <div class="shadow rounded p-3">
              <div class="form-group">
                <label for="name">Category Name</label>
                <input
                  type="text"
                  name="category_name"
                  class="form-control"
                  id=""
                  v-model="form.category_name"
                />
              </div>
              <button class="btn btn-success">Save Category</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  created() {
    if (!User.isLoggedIn) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      form: {
        category_name: "",
      },
    };
  },
  methods: {
    addCategory() {
      axios
        .post("/api/category", this.form)
        .then((response) => {
          this.$router.push({ name: "category" });
          Sweet.notification("success", "Category Inserted");
        })
        .catch();
    },
  },
};
</script>

<style>
</style>