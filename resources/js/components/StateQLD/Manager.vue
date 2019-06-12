<template>
  <!-------------------------------------->
  <!----------------Charts---------------->
  <!-------------------------------------->
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-8 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title" v-on:click="getPDF()">QLD Total Sales - Last 14 Days</h3>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <self-building-square-spinner v-if="loading" :size="40" color="#8e5ea2"/>
            </div>
            <sales-line-qld v-if="!loading"></sales-line-qld>
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
            <qr-pie-qld v-if="!loading"></qr-pie-qld>
          </div>
        </div>
      </div>

      <div class="col-md-4 col-sm-6 col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Geebung Last Fortnight Sales</h3>
          </div>
          <div class="card-body">
            <div class="d-flex justify-content-center">
              <self-building-square-spinner v-if="loading" :size="40" color="#8e5ea2"/>
            </div>
            <sales-line-gbg v-if="!loading"></sales-line-gbg>
          </div>
        </div>
      </div>
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
