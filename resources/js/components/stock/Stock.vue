<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        All Products
      </div>
      <div class="card-body">
        <div class="col-lg-6 pl-0 pb-4">
          <input
            type="search"
            class="form-control border border-dark"
            placeholder="Search Product"
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
                <th>Name</th>
                <th>Code</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Buying Date</th>
                <th>Quantity</th>
                <th>Root</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>Name</th>
                <th>Code</th>
                <th>Buying Price</th>
                <th>Selling Price</th>
                <th>Buying Date</th>
                <th>Quantity</th>
                <th>Root</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="product in filterSearch" :key="product.id">
                <td>
                  <img :src="product.image" alt="" width="50px" /><br />
                  {{ product.name }}
                </td>
                <td>{{ product.code }}</td>
                <td>{{ product.buying_price }}</td>
                <td>{{ product.selling_price }}</td>
                <td>{{ product.buying_date }}</td>
                <td v-if="product.quantity >= 1">
                  <span class="badge badge-success"
                    >Available ({{ product.quantity }})</span
                  >
                </td>
                <td v-if="product.quantity <= 0">
                  <span class="badge badge-danger">Stock Out</span>
                </td>
                <td>{{ product.root }}</td>
                <td>
                  <router-link
                    :to="{
                      name: 'edit-stock',
                      params: { id: product.id },
                    }"
                    class="btn btn-primary"
                    ><i class="fas fa-plus"></i
                  ></router-link>
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
      products: [],
      searchKey: "",
    };
  },
  methods: {
    allProducts() {
      axios
        .get("api/product/")
        .then((response) => {
          this.products = response.data;
        })
        .catch();
    },
  },
  computed: {
    filterSearch() {
      return this.products.filter((product) => {
        return product.name.match(this.searchKey);
      });
    },
  },
  created() {
    this.allProducts();
  },
};
</script>

<style>
</style>