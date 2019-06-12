<script>
import { Pie } from "vue-chartjs";

export default {
  extends: Pie,

  mounted() {
    let SalesLocation = new Array();
    let Labels = new Array();
    let Quantity = new Array();
    axios.get("api/QLDQuoteRequests").then(response => {
      let data = response.data;
      if (data) {
        data.forEach(element => {
          SalesLocation.push(element.location);
          Labels.push(element.location);
          Quantity.push(element.Quantity);
        });
        this.renderChart(
          {
            labels: SalesLocation,
            datasets: [
              {
                label: "No. of Quote Requests",
                backgroundColor: [
                  "rgba(54, 162, 235, 0.5)",
                  "rgba(255, 206, 86, 0.5)",
                  "rgba(75, 192, 192, 0.5)",
                  "rgba(153, 102, 255, 0.5)",
                  "rgba(255, 159, 64, 0.5)",
                  "rgba(255, 99, 132, 0.5)"
                ],
                borderColor: [
                  "rgba(54, 162, 235, 1)",
                  "rgba(255, 206, 86, 1)",
                  "rgba(75, 192, 192, 1)",
                  "rgba(153, 102, 255, 1)",
                  "rgba(255, 159, 64, 1)",
                  "rgba(255, 99, 132, 1)"
                ],
                borderWidth: 1,
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