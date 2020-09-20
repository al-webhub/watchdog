<template>
  <div class="content">
    <div class="md-layout">
      <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <pulse :chart-data="PulseChartData.data"
               :chart-options="PulseChartData.options"
               :chart-type="'Line'"
               data-background-color="blue">
        </pulse>
      </div>
    </div>
  </div>
</template>

<script>
import {
  Pulse
} from "@/components";

import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    Pulse
  },
  data() {
    return {
      PulseChartData: {
        data: {
          labels: null,
          series: null,
        },
        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 1,
            fillHoles: true
          }),
          height: "300px",
          low: 0,
          high: 105,
          chartPadding: {
            top: 25,
            right: 0,
            bottom: 10,
            left: 0
          },
          axisY: {
            onlyInteger: true
          }
        }
      }
    };
  },
  methods: {
    ...mapActions({
      requestPulse: "pulse/requestPulse",
      resetPulse: "pulse/resetPulse"
    })
  },
  computed: {
    ...mapGetters({
      getPulse: "pulse/getPulse"
    })
  },
   mounted() {
     let website_id = this.$route.params.website_id;
    this.requestPulse(website_id);
    this.PulseChartData.data.labels = this.getPulse.labels;
    this.PulseChartData.data.series = [
      this.getPulse.mobile,
      this.getPulse.desktop
    ];
   }
};
</script>

