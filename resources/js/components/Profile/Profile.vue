<template>
  <div class="container-fluid">
    <div class="row mt-3">
      <div class="col-md-3">
        <!-- Profile Image -->
        <div class="card card-primary card-outline">
          <div class="card-body box-profile">
            <div class="text-center">
              <img class="profile-user-img img-fluid img-circle" src alt="User profile picture">
            </div>

            <h3 class="profile-username text-center">Nina Mcintire</h3>

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

            <p
              class="text-muted"
            >Lorem ipsum represents a long-held tradition for designers, typographers and the like. Some people hate it and argue</p>

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
          <div class="card-header p-2">
            <ul class="nav nav-pills">
              <li class="nav-item">
                <a class="nav-link active" href="#activity" data-toggle="tab">Activity</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#settings" data-toggle="tab">Settings</a>
              </li>
            </ul>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <div class="tab-content">
              <div class="active tab-pane" id="activity">
                <!-- Post -->
                <div class="post">
                  <div class="user-block">
                    <img class="img-circle img-bordered-sm" src alt="user image">
                    <span class="username">
                      <a href="#">Jonathan Burke Jr.</a>
                      <a href="#" class="float-right btn-tool">
                        <i class="fa fa-times"></i>
                      </a>
                    </span>
                    <span class="description">Shared publicly - 7:30 PM today</span>
                  </div>
                  <!-- /.user-block -->
                  <p>
                    Lorem ipsum represents a long-held tradition for designers,
                    typographers and the like. Some people hate it and argue for
                    its demise, but others ignore the hate as they create awesome
                    tools to help create filler text for everyone from bacon lovers
                    to Charlie Sheen fans.
                  </p>
                </div>
                <!-- /.post -->
              </div>
              <!-- /.tab-pane -->

              <div class="tab-pane" id="settings">
                <form class="form-horizontal">
                  <div class="form-group">
                    <label for="inputName" class="col-sm-2 control-label">Name</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputName" placeholder="Name">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputEmail" class="col-sm-2 control-label">Email</label>

                    <div class="col-sm-10">
                      <input type="email" class="form-control" id="inputEmail" placeholder="Email">
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="inputInformation" class="col-sm-2 control-label">Information</label>

                    <div class="col-sm-10">
                      <textarea
                        class="form-control"
                        id="inputInformation"
                        placeholder="Information"
                      ></textarea>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="photo" class="col-sm-2 control-label">Account Photo</label>
                    <div class="col-sm-12">
                      <input type="file" name="photo" class="form-input">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                      <button type="submit" class="btn btn-success">Update</button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- /.tab-pane -->
            </div>
            <!-- /.tab-content -->
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
        email: "",
        mobile: "",
        password: "",
        remember: false
      })
    };
  },

  mounted() {
    console.log("Component mounted.");
  },

  created() {
    axios.get("api/profile").then(({ data }) => this.form.fill(data));
  }
};
</script>

<style scoped>
</style>
