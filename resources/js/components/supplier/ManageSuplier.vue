<template>
  <div>
    <div class="card mb-3">
      <div class="card-header bg-dark text-white">
        <i class="fas fa-table"></i>
        Manage Suplier
      </div>
      <div class="card-body">
        <div class="col-lg-6 pl-0 pb-4">
          <input
            type="search"
            class="form-control border border-dark"
            placeholder="Search Suplier"
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
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Shop</th>
                <th>Action</th>
              </tr>
            </thead>
            <tfoot class="bg-info">
              <tr>
                <th>Name</th>
                <th>Phone</th>
                <th>Email</th>
                <th>Address</th>
                <th>Shop</th>
                <th>Action</th>
              </tr>
            </tfoot>
            <tbody>
              <tr v-for="suplier in filterSearch" :key="suplier.id">
                <td>
                  <img :src="suplier.image" alt="" width="50px" /><br />
                  {{ suplier.name }}
                </td>
                <td>{{ suplier.phone }}</td>
                <td>{{ suplier.email }}</td>
                <td>{{ suplier.address }}</td>
                <td>{{ suplier.shop }}</td>
                <td>
                  <router-link
                    :to="{
                      name: 'edit-suplier',
                      params: { id: suplier.id },
                    }"
                    class="btn btn-primary"
                    ><i class="fas fa-plus"></i></router-link
                  ><a @click="deleteSuplier(suplier.id)" class="btn btn-danger"
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
  mounted() {
    if (!User.isLoggedIn()) {
      this.$router.push({ name: "/" });
    }
  },
  data() {
    return {
      supliers: [],
      searchKey: "",
    };
  },
  methods: {
    allSupliers() {
      axios
        .get("api/suplier/")
        .then((response) => {
          this.supliers = response.data;
        })
        .catch();
    },
    deleteSuplier(id) {
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
            .delete("/api/suplier/" + id)
            .then((response) => {
              this.supliers = this.supliers.filter((suplier) => {
                return suplier.id != id;
              });
            })
            .catch();
          Swal.fire("Deleted!", "Your file has been deleted.", "success");
        }
      });
    },
  },
  computed: {
    filterSearch() {
      return this.supliers.filter((suplier) => {
        return suplier.email.match(this.searchKey);
      });
    },
  },
  created() {
    this.allSupliers();
  },
};
</script>

<style>
</style>