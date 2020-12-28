
<script>
import { Bar, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins

export default {
  extends: Bar,
  mixins: [reactiveProp],
  name: "distribution-chart",
  props: {
    chartData: {
      required: false
    },
    chartLabels: {
      required: false
    },
    dataBackgroundColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      options: {
          scales: {
              yAxes: [{
                  ticks: {
                      beginAtZero: true
                  },
                  gridLines: {
                      display: true
                  }
              }],
              xAxes: [ {
                  gridLines: {
                      display: true
                  }
              }]
          },
          legend: {
              display: true
          },
          responsive: true,
          maintainAspectRatio: false
    }
    };
  },
  methods: {},
  mounted() {
      this.renderChart({
         labels: this.chartLabels,
         datasets: [
             {
                 label: 'Mobile',
                 borderColor: '#249EBF',
                 pointBackgroundColor: 'blue',
                 borderWidth: 1,
                 pointBorderColor: '#249EBF',
                 backgroundColor: 'blue',
                 data: this.chartData.mobile
             },
             {
                 label: 'Desktop',
                 borderColor: '#fc0303',
                 pointBackgroundColor: 'red',
                 borderWidth: 1,
                 pointBorderColor: '#fc0303',
                 backgroundColor: 'red',
                 data: this.chartData.desktop
             }
         ]
      }, this.options);
  }
};
</script>
