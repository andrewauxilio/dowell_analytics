<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,

  mounted() {
    let Dates = new Array();
    let Labels = new Array();
    let Sales = new Array();
    axios.get("api/GBGSales").then(response => {
      let data = response.data;
      if (data) {
        data.forEach(element => {
          Dates.push(element.CREATE_DATE);
          Labels.push(element.CREATE_DATE);
          Sales.push(element.NETT_SELL_PRICE);
        });
        this.renderChart(
          {
            labels: Dates,
            datasets: [
              {
                label: "Total Sales Over the Past Fortnight",
                backgroundColor: "rgba(54, 162, 235, 0.7)",
                data: Sales
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