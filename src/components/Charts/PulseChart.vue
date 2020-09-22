
<script>
import { Line, mixins } from 'vue-chartjs'
// /const { reactiveProp } = mixins;
export default {
  extends: Line,
  //mixins: [reactiveProp],
  name: "pulse-chart",
  props: {
    chartData: {
      type: Array,
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
                      display: false
                  }
              }]
          },
          legend: {
              display: false
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
                 label: '',
                 borderColor: '#249EBF',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#249EBF',
                 backgroundColor: 'transparent',
                 data: this.chartData
             }
         ]
      }, this.options);
      console.log('render');
  }
};
</script>

<style>

</style>
