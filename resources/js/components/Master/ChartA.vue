<template>
  <div class="container">
    <div class="row mt-3">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">New Quote Requests</h3>
          </div>
          <!-- /.card-header -->
          <div class="card-body table-responsive p-0">
            <table class="table table-hover">
              <tbody>
                <tr>
                  <th>Location</th>
                  <th>Quantity</th>
                </tr>
                <tr v-for="newQuoteRequest in newQuoteRequests" :key="newQuoteRequest.id">
                  <td>{{ newQuoteRequest.SalesLocation }}</td>
                  <td>{{ newQuoteRequest.Quantity }}</td>
                </tr>
              </tbody>
            </table>
          </div>
          <!-- /.card-body -->
        </div>
        <!-- /.card -->
      </div>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      newQuoteRequests: {},
      form: new Form({
        id: "",
        SalesLocation: "",
        Quantity: ""
      })
    };
  },
  methods: {
    //--------------------------------------//
    //--------Load New Quote Requests-------//
    //--------------------------------------//
    loadQuoteRequests() {
      axios
        .get("api/newQuoteRequest")
        .then(({ data }) => (this.newQuoteRequests = data.data));
    }
  },
  created() {
    this.loadQuoteRequests();
    //setInterval(() => this.loadUsers(), 3000);
  },
  mounted() {
    console.log("Component mounted.");
  }
};
</script>
