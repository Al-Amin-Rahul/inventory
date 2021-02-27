<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white shadow">
        <i class="fas fa-users"></i> Update Employee
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrap shadow rounded p-3">
            <form
              enctype="maltipart/form-data"
              @submit.prevent="updateEmployee"
            >
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
                    <label for="address">Address</label>
                    <input
                      type="text"
                      name="address"
                      id="address"
                      class="form-control"
                      v-model="form.address"
                    />
                    <small class="text-danger" v-if="errors.address">{{
                      errors.address[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="join">Join Date</label>
                    <input
                      type="date"
                      name="join_date"
                      id="join"
                      class="form-control"
                      v-model="form.join_date"
                    />
                    <small class="text-danger" v-if="errors.join_date">{{
                      errors.join_date[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <label for="image">Image</label>
                    <input
                      type="file"
                      name="image"
                      class="form-control bg-primary"
                      id="image"
                      @change="onSelect"
                    />
                    <small class="text-danger" v-if="errors.new_image">{{
                      errors.new_image[0]
                    }}</small>
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
                  <div class="form-group">
                    <label for="nid">NID</label>
                    <input
                      type="number"
                      name="nid"
                      id="nid"
                      class="form-control"
                      v-model="form.nid"
                    />
                    <small class="text-danger" v-if="errors.nid">{{
                      errors.nid[0]
                    }}</small>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-lg-6">
                        <br />
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
              </div>
              <button type="submit" class="form-control btn bg-success">
                Update Employee
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
        address: "",
        salary: "",
        join_date: "",
        nid: "",
        image: "",
        new_image: "",
      },
      errors: {},
    };
  },
  methods: {
    image() {},
    updateEmployee() {
      let id = this.$route.params.id;
      axios
        .put("/api/employee/" + id, this.form)
        .then((response) => {
          this.$router.push({ name: "/employee" });
          Sweet.notification("success", "Employee Updated !");
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
        };
        reader.readAsDataURL(file);
      }
    },
  },
};
</script>

<style>
</style>