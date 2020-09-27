<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <pulse-chart
          v-if="loaded"
          :chartData="chartData"
          :chartLabels="chartLabels"
        ></pulse-chart>
      </div>

      <div
        style="margin-top: 25px"
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <pulse-params-chart
          v-if="loaded"
          :chartData="chartData"
          :chartLabels="chartLabels"
        ></pulse-params-chart>
      </div>
    </div>
  </div>
</template>

<script>
import { PulseChart, PulseParamsChart } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    PulseChart,
    PulseParamsChart
  },
  data() {
    return {
      chartData: [],
      chartLabels: [],
      loaded: false
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
  async mounted() {
    this.loaded = false;
    let website_id = this.$route.params.website_id;
    await this.requestPulse(website_id);
    this.chartData = this.getPulse;
    this.chartLabels = this.getPulse.labels;
    this.loaded = true;
  }
};
</script>
