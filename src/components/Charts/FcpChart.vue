
<script>
import { PolarArea, mixins } from 'vue-chartjs'
const { reactiveProp } = mixins
export default {
  extends: PolarArea,
  mixins: [reactiveProp],
  name: "fcp-chart",
  props: {
    chartData: {
      type: Array,
      required: false
    },
    chartLabels: {
      type: Array,
      required: false
    },
      chartColors: {
          type: Array,
          required: false
      },
  },
  data() {
    return {
      options: {
        responsive: true,
        maintainAspectRatio: false
    }
    };
  },
  methods: {},
  mounted() {
      this.chartLabels = this.chartLabels.map(item => {
         return this.$t('fullscananalytics.graph.' + item);
      });
      this.renderChart({
         labels: this.chartLabels,
         datasets: [
             {
                 borderColor: this.chartColors,
                 pointBackgroundColor: 'white',
                 borderWidth: 1,
                 pointBorderColor: '#249EBF',
                 backgroundColor: this.chartColors,
                 data: this.chartData
             }
         ]
      }, this.options);
  }
};
</script>
