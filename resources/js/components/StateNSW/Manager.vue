<template>
  <!-------------------------------------->
  <!----------------Charts---------------->
  <!-------------------------------------->
  <div class="container-fluid">
    <div class="row" v-if="$gate.isNSWManager()">
      <div class="col-md-8 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title" v-on:click="getPDF()">NSW Total Sales - Last 14 Days</h3>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <self-building-square-spinner v-if="loading" :size="40" color="#8e5ea2"/>
            </div>
            <sales-line-now v-if="!loading"></sales-line-now>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card">
          <div class="card-header" id="pie-chart">
            <h3 class="card-title">Quote Requests -Pie Chart</h3>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <self-building-square-spinner v-if="loading" :size="40" color="#007BFF"/>
            </div>
            <qr-pie-nsw v-if="!loading"></qr-pie-nsw>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Newcastle Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <self-building-square-spinner v-if="loading" :size="40" color="#8e5ea2"/>
            </div>
            <sales-line-new v-if="!loading"></sales-line-new>
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
    </div>
    <div>
      <not-found v-if="!$gate.isNSWManager()"></not-found>
    </div>
  </div>
</template>

<script>
import { SelfBuildingSquareSpinner } from "epic-spinners";

export default {
  components: {
    SelfBuildingSquareSpinner
  },
  data() {
    return {
      loading: true,
      newQuoteRequests: {},
      newQuoteRequestsTotal: {}
    };
  },
  methods: {
    loadingAnimation() {
      this.loading = false;
    }
  },
  created() {
    setTimeout(this.loadingAnimation, 3000);
    //setInterval(() => this.loadQuoteRequests(), 3000);
    //axios.get("api/SalesController");
  }
};
</script>

<style scoped>
#pie-chart {
  background-color: #007bff !important;
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
