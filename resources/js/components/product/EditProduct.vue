<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white shadow">Edit Product</div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrap shadow rounded p-3">
            <form enctype="maltipart/form-data" @submit.prevent="updateProduct">
              <div class="row">
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="name">Product Name</label>
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
                    <label for="Category">Select Category</label>
                    <select
                      name="category_id"
                      id="Category"
                      class="form-control"
                      v-model="form.category_id"
                    >
                      <option
                        v-for="category in categories"
                        :value="category.id"
                        :key="category.id"
                      >
                        {{ category.category_name }}
                      </option>
                    </select>
                    <small class="text-danger" v-if="errors.category_id">{{
                      errors.category_id[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="buying">Buying Price</label>
                    <input
                      type="number"
                      name="buying_price"
                      id="buying"
                      class="form-control"
                      v-model="form.buying_price"
                    />
                    <small class="text-danger" v-if="errors.buying_price">{{
                      errors.buying_price[0]
                    }}</small>
                  </div>
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
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-10">
                        <label for="image">Image</label>
                        <input
                          type="file"
                          name="image"
                          class="form-control bg-primary"
                          id="image"
                          @change="onSelect"
                        />
                        <small class="text-danger" v-if="errors.image">{{
                          errors.image[0]
                        }}</small>
                      </div>
                      <div class="col-lg-2">
                        <img
                          :src="form.image"
                          alt=""
                          id="preview"
                          width="50px"
                        />
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-lg-6">
                  <div class="form-group">
                    <label for="code">Product Code</label>
                    <input
                      type="text"
                      name="code"
                      id="code"
                      class="form-control"
                      v-model="form.code"
                    />
                    <small class="text-danger" v-if="errors.code">{{
                      errors.code[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="suplier">Select Suplier</label>
                    <select
                      name="suplier_id"
                      id="suplier"
                      class="form-control"
                      v-model="form.suplier_id"
                    >
                      <option
                        v-for="suplier in supliers"
                        :key="suplier.id"
                        :value="suplier.id"
                      >
                        {{ suplier.name }}
                      </option>
                    </select>
                    <small class="text-danger" v-if="errors.suplier_id">{{
                      errors.suplier_id[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="Selling">Selling Price</label>
                    <input
                      type="number"
                      name="selling_price"
                      id="Selling"
                      class="form-control"
                      v-model="form.selling_price"
                    />
                    <small class="text-danger" v-if="errors.selling_price">{{
                      errors.selling_price[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="root">Root</label>
                    <input
                      type="text"
                      name="root"
                      id="root"
                      class="form-control"
                      v-model="form.root"
                    />
                    <small class="text-danger" v-if="errors.root">{{
                      errors.root[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="buyingDate">Buying Date</label>
                    <input
                      type="date"
                      name="buying_date"
                      id="buyingDate"
                      class="form-control"
                      v-model="form.buying_date"
                    />
                  </div>
                </div>
              </div>
              <button type="submit" class="form-control btn bg-success">
                Update Product
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
      .get("/api/category")
      .then((response) => {
        this.categories = response.data;
      })
      .catch();

    // Suplier
    axios
      .get("/api/suplier")
      .then((response) => {
        this.supliers = response.data;
      })
      .catch();
    // Product
    axios
      .get("/api/product/" + id)
      .then((response) => {
        this.form = response.data;
        this.form.image = "/" + response.data.image;
      })
      .catch();
  },
  data() {
    return {
      form: {
        name: "",
        code: "",
        category_id: "",
        suplier_id: "",
        buying_price: "",
        selling_price: "",
        quantity: "",
        root: "",
        buying_date: "",
        image: "",
        new_image: "",
      },
      errors: {},
      categories: [],
      supliers: [],
    };
  },
  methods: {
    updateProduct() {
      let id = this.$route.params.id;
      axios
        .put("/api/product/" + id, this.form)
        .then((response) => {
          this.$router.push({ name: "product" });
          Sweet.notification("success", "Product Updated !");
        })
        .catch((error) => {
          this.errors = error.response.data.errors;
        });
    },
    onSelect(event) {
      let file = event.target.files[0];
      if (file.size > 10240000) {
        Sweet.notification("warning", "Upload Image Less Than 10MB");
      } else {
        let reader = new FileReader();
        reader.onload = (event) => {
          this.form.image = event.target.result;
          this.form.new_image = event.target.result;
        };
        reader.readAsDataURL(file);
      }
    },
  },
};
</script>

<style>
</style>