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

      <div class="col-4 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Newcastle Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-line-new></sales-line-new>
          </div>
        </div>
      </div>

      <div class="col-4 mt-3">
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
      </div>

      <div class="col-4 mt-3">
        <div class="card card-primary">
          <div class="card-header">
            <h3 class="card-title">Newcastle Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <sales-bar-new></sales-bar-new>
          </div>
        </div>
      </div>

      <div class="col-4 mt-3">
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
      </div>

      <div class="col-4 mt-3">
        <div class="card">
          <div class="card-header" id="pie-chart">
            <h3 class="card-title">Quote Requests -Pie Chart</h3>
          </div>
          <div class="card-body">
            <new-quote-requests-pie></new-quote-requests-pie>
          </div>
        </div>
      </div>

      <div class="col-4 mt-3">
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
                  <td class="site">{{ newQuoteRequest.SalesLocation | toLongName }}</td>
                  <td class="number">{{ newQuoteRequest.Quantity }}</td>
                </tr>
              </tbody>
            </table>
          </div>
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
    //setInterval(() => this.loadQuoteRequests(), 3000);
    axios.get("api/SalesController");
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
