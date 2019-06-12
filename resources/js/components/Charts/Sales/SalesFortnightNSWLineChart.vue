<script>
import { Line } from "vue-chartjs";

export default {
  extends: Line,

  mounted() {
    let Dates = new Array();
    let Labels = new Array();
    let Sales = new Array();
    axios.get("api/NSWSales").then(response => {
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
                borderColor: "#8e5ea2",
                data: Sales,
                fill: true
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