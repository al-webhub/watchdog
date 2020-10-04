
<script>
import { Line, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins
export default {
  extends: Line,
  mixins: [reactiveProp],
  name: "pulse-chart",
  props: {
    chartData: {
      type: Object,
      required: false
    },
    chartLabels: {
      type: Array,
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
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#249EBF',
                 backgroundColor: 'transparent',
                 data: this.chartData.mobile
             },
             {
                 label: 'Desktop',
                 borderColor: '#fc0303',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#fc0303',
                 backgroundColor: 'transparent',
                 data: this.chartData.desktop
             }
         ]
      }, this.options);
  }
};
</script>
