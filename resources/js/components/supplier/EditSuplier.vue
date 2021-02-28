<template>
  <div>
    <div class="container">
      <div class="alert bg-dark text-white shadow">
        <i class="fas fa-users"></i> Update Suplier
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="wrap shadow rounded p-3">
            <form enctype="maltipart/form-data" @submit.prevent="updateSuplier">
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
                    <label for="phone">Phone</label>
                    <input
                      type="number"
                      name="phone"
                      id="phone"
                      class="form-control"
                      v-model="form.phone"
                    />
                    <small class="text-danger" v-if="errors.phone">{{
                      errors.phone[0]
                    }}</small>
                  </div>
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
                    <label for="shop">Shop</label>
                    <input
                      type="text"
                      name="shop"
                      id="shop"
                      class="form-control"
                      v-model="form.shop"
                    />
                    <small class="text-danger" v-if="errors.shop">{{
                      errors.shop[0]
                    }}</small>
                  </div>
                </div>
              </div>
              <button type="submit" class="form-control btn bg-success">
                Update Suplier
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
      .get("/api/suplier/" + id)
      .then((response) => {
        this.form = response.data;
      })
      .catch();
  },
  data() {
    return {
      form: {
        name: "",
        phone: "",
        email: "",
        address: "",
        shop: "",
        image: "",
        new_image: "",
      },
      errors: {},
    };
  },
  methods: {
    updateSuplier() {
      let id = this.$route.params.id;
      axios
        .put("/api/suplier/" + id, this.form)
        .then((response) => {
          this.$router.push({ name: "suplier" });
          Sweet.notification("success", "Suplier Updated !");
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
          this.form.new_image = event.target.result;
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