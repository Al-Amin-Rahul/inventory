<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white shadow">Edit Stock</div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrap shadow rounded p-3">
            <form enctype="maltipart/form-data" @submit.prevent="updateStock">
              <div class="row">
                <div class="col-lg-12">
                  <div class="form-group">
                    <label for="pQuantity">Quantity</label>
                    <input
                      type="number"
                      name="quantity"
                      class="form-control"
                      id="pQuantity"
                      v-model="form.quantity"
                    />
                    <small class="text-danger" v-if="errors.quantity">{{
                      errors.quantity[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <button type="submit" class="form-control btn bg-success">
                Update Stock
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
      .get("/api/product/" + id)
      .then((response) => {
        this.form = response.data;
        console.log(response.data);
      })
      .catch();
  },
  data() {
    return {
      form: {
        quantity: "",
      },
      errors: {},
      categories: [],
    };
  },
  methods: {
    updateStock() {
      let id = this.$route.params.id;
      axios
        .put("/api/update-stock/" + id, this.form)
        .then((response) => {
          Sweet.notification("success", "Stock Updated");
          this.$router.push({ name: "stock" });
        })
        .catch();
    },
  },
};
</script>

<style>
</style>