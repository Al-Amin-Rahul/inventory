<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white">Edit Category</div>
      <div class="row">
        <div class="col-lg-12">
          <form @submit.prevent="updateCategory">
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
                <small class="text-danger" v-if="errors.category_name">{{
                  errors.category_name[0]
                }}</small>
              </div>
              <button class="btn btn-success">Update Category</button>
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
        errors: "",
      },
    };
  },
  mounted() {
    let id = this.$route.params.id;
    axios
      .get("/api/category/" + id)
      .then((response) => {
        this.form = response.data;
      })
      .catch();
  },
  methods: {
    updateCategory() {
      let id = this.$route.params.id;
      axios
        .put("/api/category/" + id, this.form)
        .then((response) => {
          this.$router.push({ name: "category" });
          Sweet.notification("success", "Category Updated");
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