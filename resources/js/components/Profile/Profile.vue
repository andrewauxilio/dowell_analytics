<template>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img
                class="profile-user-img img-fluid img-circle"
                :src="getProfilePhoto()"
                alt="User profile picture"
              >
            </div>

            <h3 class="profile-username text-center">{{ form.name }}</h3>

            <p class="text-muted text-center">Software Engineer</p>

            <ul class="list-group list-group-unbordered mb-3">
              <li class="list-group-item">
                <b>Followers</b>
                <a class="float-right">1,322</a>
              </li>
              <li class="list-group-item">
                <b>Following</b>
                <a class="float-right">543</a>
              </li>
              <li class="list-group-item">
                <b>Friends</b>
                <a class="float-right">13,287</a>
              </li>
            </ul>

            <a href="#" class="btn btn-primary btn-block">
              <b>Message</b>
            </a>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <!-- About Me Box -->
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">About Me</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <strong>
              <i class="fas fa-info-circle"></i> Information
            </strong>

            <p class="text-muted">{{ form.info }}</p>
            <hr>

            <strong>
              <i class="fa fa-map-marker mr-1"></i> Location
            </strong>

            <p class="text-muted">Bayswater, Victoria</p>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col -->
      <div class="col-md-9">
        <div class="card">
          <div class="card-header p-2">Account Settings</div>
          <!-- /.card-header -->
          <div class="card-body">
            <form class="form-horizontal">
              <div class="form-group">
                <label for="inputName" class="col-sm-2 control-label">Name</label>

                <div class="col-sm-10">
                  <input
                    v-model="form.name"
                    type="name"
                    class="form-control"
                    id="inputName"
                    placeholder="Name"
                    :class="{ 'is-invalid': form.errors.has('name') }"
                  >
                  <has-error :form="form" field="name"></has-error>
                </div>
              </div>
              <div class="form-group">
                <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                <div class="col-sm-10">
                  <input
                    v-model="form.email"
                    type="email"
                    class="form-control"
                    id="inputEmail"
                    placeholder="Email"
                    :class="{ 'is-invalid': form.errors.has('email') }"
                  >
                  <has-error :form="form" field="email"></has-error>
                </div>
              </div>
              <div class="form-group">
                <label for="inputMobile" class="col-sm-2 control-label">Mobile</label>

                <div class="col-sm-10">
                  <input
                    v-model="form.mobile"
                    type="number"
                    class="form-control"
                    id="inputMobile"
                    placeholder="Mobile"
                    :class="{ 'is-invalid': form.errors.has('mobile') }"
                  >
                  <has-error :form="form" field="mobile"></has-error>
                </div>
              </div>
              <div class="form-group">
                <label for="inputInformation" class="col-sm-2 control-label">Information</label>

                <div class="col-sm-10">
                  <textarea
                    v-model="form.info"
                    class="form-control"
                    id="inputInformation"
                    placeholder="Information"
                    :class="{ 'is-invalid': form.errors.has('info') }"
                  ></textarea>
                  <has-error :form="form" field="info"></has-error>
                </div>
              </div>
              <div class="form-group">
                <label for="photo" class="col-sm-2 control-label">Account Photo</label>
                <div class="col-sm-12">
                  <input type="file" name="photo" class="form-input" @change="updatePhoto">
                </div>
              </div>
              <div class="form-group">
                <label for="inputMobile" class="col-sm-2 control-label">Password</label>

                <div class="col-sm-10">
                  <input
                    v-model="form.password"
                    type="password"
                    class="form-control"
                    id="inputPassword"
                    placeholder="Password"
                    :class="{ 'is-invalid': form.errors.has('password') }"
                  >
                  <has-error :form="form" field="password"></has-error>
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-2 col-sm-10">
                  <button
                    type="submit"
                    class="btn btn-success"
                    @click.prevent="updateProfile"
                  >Update</button>
                </div>
              </div>
            </form>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.nav-tabs-custom -->
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </div>
</template>

<script>
export default {
  data() {
    return {
      form: new Form({
        id: "",
        name: "",
        role: "",
        info: "",
        photo: "",
        email: "",
        mobile: "",
        password: "",
        remember: false
      })
    };
  },

  methods: {
    getProfilePhoto() {
      let prefix = this.form.photo.match(/\//) ? "" : "/images/profile/";
      return prefix + this.form.photo;
    },

    updateProfile() {
      this.$Progress.start();
      if (this.form.password == "") {
        this.form.password = undefined;
      }
      this.form
        .put("api/profile")
        .then(() => {
          Fire.$emit("profileChanges");
          swal.fire(
            "Updated",
            "Your profile has been updated successfully!",
            "success"
          );
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },

    updatePhoto(event) {
      //console.log("uploading");
      let file = event.target.files[0];
      console.log(file);
      let reader = new FileReader();
      if (file["size"] < 2111775) {
        reader.onloadend = file => {
          //console.log("RESULT", reader.result);
          this.form.photo = reader.result;
        };
        reader.readAsDataURL(file);
      } else {
        swal.fire({
          type: "error",
          title: "Uh oh!",
          text:
            "Your image has exceeded the 2MB file limit. Please select another image."
        });
      }
    },

    loadProfile() {
      axios.get("api/profile").then(({ data }) => this.form.fill(data));
    }
  },

  mounted() {
    console.log("Component mounted.");
  },

  created() {
    this.loadProfile();
    Fire.$on("profileChanges", () => {
      this.loadProfile();
    });
  }
};
</script>

<style scoped>
</style>
