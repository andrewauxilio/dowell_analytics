<script>
import { Bar } from "vue-chartjs";

export default {
  extends: Bar,

  mounted() {
    let SalesLocation = new Array();
    let Labels = new Array();
    let Quantity = new Array();
    axios.get("api/newQuoteRequest").then(response => {
      let data = response.data;
      if (data) {
        data.forEach(element => {
          SalesLocation.push(element.SalesLocation);
          Labels.push(element.SalesLocation);
          Quantity.push(element.Quantity);
        });
        this.renderChart(
          {
            labels: SalesLocation,
            datasets: [
              {
                label: "No. of Quote Requests",
                backgroundColor: "rgba(54, 162, 235, 0.7)",
                data: Quantity
              }
            ]
          },
          { responsive: true, maintainAspectRatio: false }
        );
      } else {
        console.log("No data");
      }
    });
  }
};
</script>