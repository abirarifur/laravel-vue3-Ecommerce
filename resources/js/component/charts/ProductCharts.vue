<template>
  <canvas id="productChart" ref="productChart" class="shadow"></canvas>
</template>

<script>
import Chart from "chart.js/auto/auto";
export default {
props: {
    productchartdata: {
        type: Array,
    },
},
  data() {
    return {
        months: ['Jan', 'Feb', 'Mar', 'Apr','May', 'Jun', 'July', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
        daysInCurrentMonth: 0,
        currentMonth: 0,
        productchart: []
    };
  },
  methods: {
    setMonth(){
        let dt = new Date();
        this.currentMonth = dt.getMonth() + 1;
        let year = dt.getFullYear();
        this.daysInCurrentMonth = new Date(year, this.currentMonth, 0).getDate();
    },
    totalDateForChart() {
        let dateData = [];
        for (let i = 0; i < this.daysInCurrentMonth; i++){
        dateData.push(this.months[ this.currentMonth - 1 ]+'-'+ (i+1))
        }
        return dateData;
    },

    productChart() {
      let ctx = document.getElementById("productChart");
      let myChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: this.totalDateForChart(),
          datasets: [
            {
              fill: true,
              label: "# Added Product",
              data: this.productchartdata,
              backgroundColor: [
                "rgba(255, 99, 132, 0.2)",
                "rgba(54, 162, 235, 0.2)",
                "rgba(255, 206, 86, 0.2)",
                "rgba(75, 192, 192, 0.2)",
                "rgba(153, 102, 255, 0.2)",
                "rgba(255, 159, 64, 0.2)",
              ],
              borderColor: [
                "rgba(255, 99, 132, 1)",
                "rgba(54, 162, 235, 1)",
                "rgba(255, 206, 86, 1)",
                "rgba(75, 192, 192, 1)",
                "rgba(153, 102, 255, 1)",
                "rgba(255, 159, 64, 1)",
              ],
              borderWidth: 5,
            },
          ],
        },
        options: {
          scales: {
            y: {
              beginAtZero: true,
            },
          },
        },
      });
    },
  },
  mounted() {

    this.totalDateForChart();
    this.productChart();

  },
  beforeMount () {
      this.setMonth();;
  },

};
</script>

<style lang="scss" scoped>
</style>
