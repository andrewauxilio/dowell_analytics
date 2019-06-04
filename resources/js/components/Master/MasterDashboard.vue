<template>
  <div class="container">
    <div class="row">
      <div class="col-6 mt-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Quote Requests From All Sites</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th class="site">Site</th>
                  <th class="number">Number of Requests</th>
                </tr>
                <tr v-for="newQuoteRequest in newQuoteRequests" :key="newQuoteRequest.id">
                  <td class="site">{{ newQuoteRequest.SalesLocation | toLongName }}</td>
                  <td class="number">{{ newQuoteRequest.Quantity }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-6 mt-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Quote Requests From All Sites</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th class="site">Site</th>
                  <th class="number">Number of Requests</th>
                </tr>
                <tr v-for="newQuoteRequest in newQuoteRequests" :key="newQuoteRequest.id">
                  <td class="site">{{ newQuoteRequest.SalesLocation | toLongName }}</td>
                  <td class="number">{{ newQuoteRequest.Quantity }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
      <div class="col-6 mt-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Bar Chart</h3>

            <div class="card-tools">
              <button type="button" class="btn btn-tool">
                <i class="fas fa-sync"></i>
              </button>
            </div>
          </div>
          <div class="card-body">
            <new-quote-requests-bar></new-quote-requests-bar>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
      <div class="col-6 mt-3">
        <div class="card">
          <div class="card-header" id="pie-chart">
            <h3 class="card-title">Pie Chart</h3>
          </div>
          <div class="card-body">
            <new-quote-requests-pie></new-quote-requests-pie>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newQuoteRequests: {}
    };
  },
  methods: {
    //--------------------------------------//
    //--------Load New Quote Requests-------//
    //--------------------------------------//
    loadQuoteRequests() {
      axios
        .get("api/newQuoteRequest")
        .then(({ data }) => (this.newQuoteRequests = data));
    }
  },
  created() {
    this.loadQuoteRequests();
    //setInterval(() => this.loadQuoteRequests(), 10000);
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

<style scoped>
.number {
  text-align: center;
}
#pie-chart {
  background-color: #17a2b8 !important;
  color: white;
}
</style>
