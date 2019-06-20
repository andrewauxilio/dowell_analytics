<template>
  <div class="container">
    <div class="row justify-content-center" v-if="$gate.isQLDStandard()">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Example Component</div>

          <div class="card-body">I'm an example component.</div>
        </div>
      </div>
    </div>
    <div>
      <not-found v-if="!$gate.isQLDStandard()"></not-found>
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
