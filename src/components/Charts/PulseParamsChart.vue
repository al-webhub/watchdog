
<script>
import { Line, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins
export default {
  extends: Line,
  mixins: [reactiveProp],
  name: "pulse-params-chart",
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
                 label: 'First contentful paint Mobile',
                 borderColor: '#249EBF',
                 pointBackgroundColor: 'white',
                 borderWidth: 2,
                 pointBorderColor: '#1ebfbe',
                 backgroundColor: 'transparent',
                 data: this.chartData.fcp_mobile
             },
             {
                 label: 'First contentful paint Desktop',
                 borderColor: '#1578bf',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#1578bf',
                 backgroundColor: 'transparent',
                 data: this.chartData.fcp_desktop
             },
             {
                 label: 'Time to interact Desktop',
                 borderColor: '#26bf00',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#26bf00',
                 backgroundColor: 'transparent',
                 data: this.chartData.tti_desktop
             },
             {
                 label: 'Time to interact Mobile',
                 borderColor: '#0e9607',
                 pointBackgroundColor: 'white',
                 borderWidth: 2,
                 pointBorderColor: '#0e9607',
                 backgroundColor: 'transparent',
                 data: this.chartData.tti_mobile
             },
             {
                 label: 'Speed index Mobile',
                 borderColor: '#960200',
                 pointBackgroundColor: 'white',
                 borderWidth: 2,
                 pointBorderColor: '#960200',
                 backgroundColor: 'transparent',
                 data: this.chartData.si_mobile
             },
             {
                 label: 'Speed index Desktop',
                 borderColor: '#960200',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#960200',
                 backgroundColor: 'transparent',
                 data: this.chartData.si_desktop
             },
             {
                 label: 'Time to first byte Mobile',
                 borderColor: '#afae00',
                 pointBackgroundColor: 'white',
                 borderWidth: 2,
                 pointBorderColor: '#969300',
                 backgroundColor: 'transparent',
                 data: this.chartData.ttfb_mobile
             },
             {
                 label: 'Time to first byte Desktop',
                 borderColor: '#afae00',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#969000',
                 backgroundColor: 'transparent',
                 data: this.chartData.ttfb_desktop
             },
             {
                 label: 'Total blocking time Desktop',
                 borderColor: '#0200af',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#0200af',
                 backgroundColor: 'transparent',
                 data: this.chartData.tbt_desktop
             },
             {
                 label: 'Total blocking time  Mobile',
                 borderColor: '#0200af',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#0200af',
                 backgroundColor: 'transparent',
                 data: this.chartData.tbt_mobile
             },
             {
                 label: 'Content layout shift Desktop',
                 borderColor: '#0200af',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#0200af',
                 backgroundColor: 'transparent',
                 data: this.chartData.cls_desktop
             },
             {
                 label: 'Content layout shift  Mobile',
                 borderColor: '#0200af',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#0200af',
                 backgroundColor: 'transparent',
                 data: this.chartData.cls_mobile
             },
             {
                 label: 'Total byte weight Desktop',
                 borderColor: '#0200af',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#0200af',
                 backgroundColor: 'transparent',
                 data: this.chartData.tbw_desktop
             },
             {
                 label: 'Total byte weight  Mobile',
                 borderColor: '#0200af',
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#0200af',
                 backgroundColor: 'transparent',
                 data: this.chartData.tbw_desktop
             },
         ]
      }, this.options);
  }
};
</script>
