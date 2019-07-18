<template>
  <div class="container-fluid">
    <div class="row justify-content-center">
      <div class="col-md-3 mt-3">
        <router-link to="/reports-qld">
          <button type="button" class="btn btn-block btn-secondary btn-lg">
            <i class="fas fa-hand-point-left"></i>
            Back To Reports 
          </button>
        </router-link>
        <div class="card card-danger mt-3">
          <div class="card-header">
            <h3 class="card-title">Search Criteria</h3>
          </div>
          <div class="card-body">
            <!-- Date dd/mm/yyyy -->
            <div class="form-group">
              <label>Dates</label>

              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  data-inputmask="'alias': 'dd/mm/yyyy'"
                  data-mask
                  im-insert="true"
                  placeholder="From Date"
                />
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->

            <!-- Date mm/dd/yyyy -->
            <div class="form-group">
              <div class="input-group">
                <div class="input-group-prepend">
                  <span class="input-group-text">
                    <i class="fas fa-calendar-alt"></i>
                  </span>
                </div>
                <input
                  type="text"
                  class="form-control"
                  data-inputmask="'alias': 'mm/dd/yyyy'"
                  data-mask
                  im-insert="true"
                  placeholder="To Date"
                />
              </div>
              <!-- /.input group -->
            </div>
            <!-- /.form group -->
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <!-- /.col (left) -->
      <div class="col-md-9 mt-3">
        <div class="card card-info">
          <div class="card-header">
            <h3 class="card-title">Line Chart</h3>
          </div>
          <div class="card-body">
            <sales-line-nat v-if="!loading"></sales-line-nat>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->

        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Sales Rep Sales</h3>

            <div class="card-tools">
              <div class="input-group input-group-sm" style="width: 150px;">
                <input
                  type="text"
                  name="table_search"
                  class="form-control float-right"
                  placeholder="Search"
                />

                <div class="input-group-append">
                  <button type="submit" class="btn btn-default">
                    <i class="fas fa-search"></i>
                  </button>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <thead>
                <tr>
                  <th>Rep No.</th>
                  <th>Sales</th>
                  <th>Rec %</th>
                  <th>Rec $</th>
                  <th>Orders In</th>
                  <th>Quotes</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  <td>R02</td>
                  <td>2,123</td>
                  <td>23.1%</td>
                  <td>492</td>
                  <td>-</td>
                  <td>132,999</td>
                </tr>
                <tr>
                  <td>R03</td>
                  <td>495,386</td>
                  <td>51.3%</td>
                  <td>253,885</td>
                  <td>509,820</td>
                  <td>1,438,732</td>
                </tr>
                <tr>
                  <td>Total</td>
                  <td>497,518</td>
                  <td>51.1%</td>
                  <td>254,377</td>
                  <td>509,820</td>
                  <td>1,571,731</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <!-- /.col (right) -->
    </div>
    <!-- <div>
      <not-found v-if="!$gate.isNSWStandard()"></not-found>
    </div>-->
  </div>
</template>

<script>
import Datepicker from "vuejs-datepicker";

export default {
  mounted() {
    console.log("Component mounted.");
  },
  components: {
    Datepicker
  }
};
</script>

<style scoped>
</style>
