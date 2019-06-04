<template>
  <div class="container">
    <div class="row">
      <div class="col-12 mt-3">
        <div class="card card-primary">
          <div class="card-header" id="line-chart">
            <h3 class="card-title">Geebung Last Fortnight Sales - Line Chart</h3>
          </div>
          <div class="card-body">
            <gbg-sales-line></gbg-sales-line>
          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  mounted() {
    console.log("Component mounted.");
  }
};
</script>

<style scoped>
#line-chart {
  background-color: #8e5ea2 !important;
  color: white;
}
</style>
