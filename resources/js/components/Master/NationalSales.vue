<template>
  <!-------------------------------------->
  <!----------------Charts---------------->
  <!-------------------------------------->
  <div class="container-fluid">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Totals Sales Over 30 Days - National</h3>
          </div>
          <div class="card-body">
            <sales-line-nat></sales-line-nat>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Newcastle Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-line-new></sales-line-new>
          </div>
        </div>
      </div>

      <!-- <div class="col-4 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Nowra Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-line-now></sales-line-now>
          </div>
        </div>
      </div>

      <div class="col-4 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Smithfield Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-line-smt></sales-line-smt>
          </div>
        </div>
      </div>-->

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Newcastle Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-bar-new></sales-bar-new>
          </div>
        </div>
      </div>

      <!-- <div class="col-4 mt-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Nowra Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-bar-now></sales-bar-now>
          </div>
        </div>
      </div>

      <div class="col-4 mt-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Smithfield Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-bar-smt></sales-bar-smt>
          </div>
        </div>
      </div>-->

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card">
          <div class="card-header" id="pie-chart">
            <h3 class="card-title">Quote Requests -Pie Chart</h3>
          </div>
          <div class="card-body">
            <new-quote-requests-pie></new-quote-requests-pie>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Quote Requests From All Sites</h3>
          </div>
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th class="site">Site</th>
                  <th class="number">Number of Requests</th>
                </tr>
                <tr v-for="newQuoteRequest in newQuoteRequests" :key="newQuoteRequest.id">
                  <td class="site">{{ newQuoteRequest.location | toLongName }}</td>
                  <td class="number">{{ newQuoteRequest.Quantity }}</td>
                </tr>
                <tr
                  v-for="newQuoteRequestsTotals in newQuoteRequestsTotal"
                  :key="newQuoteRequestsTotals.id"
                >
                  <th class="site">Total</th>
                  <td class="number">{{ newQuoteRequestsTotals.Quantity }}</td>
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>

      <div
        class="col-md-2 col-sm-4 col-6 mt-3"
        v-for="newQuoteRequest in newQuoteRequests"
        :key="newQuoteRequest.id"
      >
        <div class="info-box">
          <span class="info-box-icon bg-success">
            <i class="fas fa-file-contract"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">{{ newQuoteRequest.location }} QRs</span>
            <span class="info-box-number">{{ newQuoteRequest.Quantity }}</span>
          </div>
        </div>
      </div>

      <!-- <div class="col-md-2 col-sm-4 col-6 mt-3">
        <div class="info-box">
          <span class="info-box-icon bg-success">
            <i class="fas fa-file-contract"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">ELI Quote Requests</span>
            <span class="info-box-number">7</span>
          </div>
        </div>
      </div>

      <div class="col-md-2 col-sm-4 col-6 mt-3">
        <div class="info-box">
          <span class="info-box-icon bg-success">
            <i class="fas fa-file-contract"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">BAY Quote Requests</span>
            <span class="info-box-number">4</span>
          </div>
        </div>
      </div>

      <div class="col-md-2 col-sm-4 col-6 mt-3">
        <div class="info-box">
          <span class="info-box-icon bg-success">
            <i class="fas fa-file-contract"></i>
          </span>

          <div class="info-box-content">
            <span class="info-box-text">NEW Quote Requests</span>
            <span class="info-box-number">7</span>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newQuoteRequests: {},
      newQuoteRequestsTotal: {}
    };
  },
  methods: {
    //--------------------------------------//
    //--------Load New Quote Requests-------//
    //--------------------------------------//
    loadQuoteRequests() {
      axios
        .get("api/NATQuoteRequests")
        .then(({ data }) => (this.newQuoteRequests = data));
      axios
        .get("api/NATTotalQuoteRequests")
        .then(({ data }) => (this.newQuoteRequestsTotal = data));
    }
  },
  created() {
    this.loadQuoteRequests();
    //setInterval(() => this.loadQuoteRequests(), 3000);
    //axios.get("api/SalesController");
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
#line-chart {
  background-color: #8e5ea2 !important;
  color: white;
}
#spinner {
  position: absolute;
  left: 50%;
  top: 50%;
  transform: translate(-50%, -50%);
}
</style>
