<template>
  <div class="container">
    <div class="row" v-if="$gate.isAdministrator()">
      <div class="col-12 mt-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Users List</h3>
            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 200px;">
                <input
                  type="text"
                  name="table_search"
                  class="form-control float-right"
                  placeholder="Search"
                  style="height: 37.5px;"
                >

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fa fa-search"></i>
                  </button>
                </div>
                <div class>
                  <button
                    class="btn btn-success"
                    @click="newUserModal"
                    data-toggle="modal"
                    data-target="#userModal"
                  >
                    Add New
                    <i class="fas fa-user-plus fa-fw"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Mobile</th>
                  <th>Role</th>
                  <th>Registration Date</th>
                  <th>Last Modified</th>
                  <th>Actions</th>
                </tr>
                <tr v-for="user in users.data" :key="user.id">
                  <td>{{ user.name }}</td>
                  <td>{{ user.email }}</td>
                  <td>{{ user.mobile }}</td>
                  <td>{{ user.role | toUpperCase }}</td>
                  <td>{{ user.created_at | myDate }}</td>
                  <td>{{ user.updated_at | myDate }}</td>
                  <td>
                    <button class="btn btn-primary" @click="editUserModal(user)">
                      <i class="fas fa-edit blue"></i>
                    </button>
                    <button class="btn btn-danger" @click="deleteUser(user.id)">
                      <i class="fas fa-trash"></i>
                    </button>
                  </td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
          <div class="card-footer">
            <pagination :data="users" @pagination-change-page="getResults"></pagination>
          </div>
        </div>
        <!-- /.card -->
      </div>
    </div>

    <div>
      <not-found v-if="!$gate.isAdministrator()"></not-found>
    </div>

    <!-- User Modal -->
    <!-- Modal -->
    <div
      class="modal fade"
      id="userModal"
      tabindex="-1"
      role="dialog"
      aria-labelledby="userModalLabel"
      aria-hidden="true"
    >
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" v-show="!editmode" id="userModalLabel">Create A User</h5>
            <h5 class="modal-title" v-show="editmode" id="userModalLabel">Update User Details</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <form @submit.prevent="editmode ? updateUser() : createUser()">
            <div class="modal-body">
              <div class="form-group">
                <label>Full Name</label>
                <input
                  v-model="form.name"
                  type="text"
                  name="name"
                  placeholder="Enter name here..."
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('name') }"
                >
                <has-error :form="form" field="name"></has-error>
              </div>

              <div class="form-group">
                <label>Email Address</label>
                <input
                  v-model="form.email"
                  type="email"
                  name="email"
                  placeholder="Enter email address here..."
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('email') }"
                >
                <has-error :form="form" field="email"></has-error>
              </div>

              <div class="form-group">
                <label>Role</label>
                <select
                  v-model="form.role"
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('type') }"
                >
                  <option value="admin">Administrator</option>
                  <option value="national">National</option>
                  <option value="nsw_manager">NSW Manager</option>
                  <option value="nsw_standard">NSW Standard</option>
                  <option value="qld_manager">QLD Manager</option>
                  <option value="qld_standard">QLD Standard</option>
                </select>
                <has-error :form="form" field="type"></has-error>
              </div>

              <div class="form-group">
                <label>Mobile Phone Number (Optional)</label>
                <input
                  v-model="form.mobile"
                  type="text"
                  name="mobile"
                  placeholder="Enter mobile phone number here..."
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('mobile') }"
                >
                <has-error :form="form" field="mobile"></has-error>
              </div>

              <div class="form-group">
                <label>Password</label>
                <input
                  v-model="form.password"
                  type="password"
                  name="password"
                  placeholder="Enter password here..."
                  class="form-control"
                  :class="{ 'is-invalid': form.errors.has('password') }"
                >
                <has-error :form="form" field="password"></has-error>
              </div>
            </div>

            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
              <button v-show="!editmode" type="submit" class="btn btn-success">Create</button>
              <button v-show="editmode" type="submit" class="btn btn-primary">Update</button>
            </div>
          </form>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      editmode: true,
      users: {},
      form: new Form({
        id: "",
        name: "",
        role: "",
        email: "",
        photo: "",
        mobile: "",
        password: "",
        remember: false
      })
    };
  },
  methods: {
    // Our method to GET results from a Laravel endpoint
    getResults(page = 1) {
      axios.get("api/user?page=" + page).then(response => {
        this.users = response.data;
      });
    },
    //--------------------------------------//
    //----------Update user method----------//
    //--------------------------------------//
    updateUser(id) {
      this.$Progress.start();
      if (this.form.password == "") {
        this.form.password = undefined;
      }
      this.form
        .put("api/user/" + this.form.id)
        .then(() => {
          Fire.$emit("UserChanges");
          $("#userModal").modal("hide");
          swal.fire(
            "Updated!",
            "User has been successfully updated.",
            "success"
          );
          this.$Progress.finish();
        })
        .catch(() => {
          this.$Progress.fail();
        });
    },
    //--------------------------------------//
    //---------Deleting user method---------//
    //--------------------------------------//
    deleteUser(id) {
      //1 Ask user if he is sure
      swal
        .fire({
          title: "Are you sure?",
          text: "You won't be able to revert this!",
          type: "warning",
          showCancelButton: true,
          confirmButtonColor: "#3085d6",
          cancelButtonColor: "#d33",
          confirmButtonText: "Yes, delete it!"
        })
        .then(result => {
          if (result.value) {
            //2 Delete user from database
            this.form
              .delete("api/user/" + id)
              .then(() => {
                //3 Notify user deletion
                swal.fire(
                  "Deleted!",
                  "User has been successfully deleted.",
                  "success"
                );
                //4 Reload user table
                Fire.$emit("UserChanges");
              })
              .catch(() => {
                swal.fire(
                  "Failed!",
                  "There was an error deleting the user.",
                  "warning"
                );
              });
          }
        });
    },
    //--------------------------------------//
    //-------Creating new user method-------//
    //--------------------------------------//
    createUser() {
      //1 Progress bar start
      this.$Progress.start();
      //2 Save details in database
      this.form
        .post("api/user")
        .then(() => {
          //3 Reload user table
          Fire.$emit("UserChanges");
          $("#userModal").modal("hide");
          //4 Display successs notification
          toast.fire({
            type: "success",
            title: "User created successfully"
          });
          //5 Progress bar end
          this.$Progress.finish();
        })
        .catch(() => {});
    },
    //--------------------------------------//
    //--------Load user table method--------//
    //--------------------------------------//
    loadUsers() {
      if (this.$gate.isAdministrator()) {
        axios.get("api/user").then(({ data }) => (this.users = data));
      }
    },
    //--------------------------------------//
    //-----------Switching Modals-----------//
    //--------------------------------------//
    newUserModal() {
      this.editmode = false;
      this.form.reset();
      $("#userModal").modal("show");
    },
    editUserModal(user) {
      this.editmode = true;
      this.form.reset();
      $("#userModal").modal("show");
      this.form.fill(user);
    }
  },
  created() {
    this.loadUsers();
    //setInterval(() => this.loadUsers(), 3000);
    Fire.$on("UserChanges", () => {
      this.loadUsers();
    });
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
