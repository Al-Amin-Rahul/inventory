<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        All Categories
      </div>
      <div class="card-body">
        <div class="col-lg-6 pl-0 pb-4">
          <input
            type="search"
            class="form-control border border-dark"
            placeholder="Search Categories"
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
                <th>No</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>No</th>
                <th>Category Name</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="category in filterSearch" :key="category.id">
                <td>{{ category.id }}</td>
                <td>{{ category.category_name }}</td>
                <td>
                  <router-link
                    :to="{
                      name: 'edit-category',
                      params: { id: category.id },
                    }"
                    class="btn btn-primary"
                    ><i class="fas fa-plus"></i
                  ></router-link>
                  <a class="btn btn-danger" @click="deleteCategory(category.id)"
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
  created() {
    if (!User.isLoggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      categories: [],
      searchKey: "",
    };
  },
  computed: {
    filterSearch() {
      return this.categories.filter((category) => {
        return category.category_name.match(this.searchKey);
      });
    },
  },
  methods: {
    deleteCategory(id) {
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
            .delete("/api/category/" + id)
            .then((response) => {
              this.categories = this.categories.filter((category) => {
                return category.id != id;
              });
            })
            .catch();
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
  mounted() {
    axios
      .get("/api/category")
      .then((response) => {
        this.categories = response.data;
      })
      .catch();
  },
};
</script>

<style>
</style>