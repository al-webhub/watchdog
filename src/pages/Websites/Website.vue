<template>
  <div class="content">
    <div class="md-layout">
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100">
        <pulse-chart v-if="loaded" :chartData="chartData" :chartLabels="chartLabels"></pulse-chart>
      </div>
      <div class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-20">
        <stats-card data-background-color="green">
          <template slot="header">
            <md-icon>store</md-icon>
          </template>

          <template slot="content">
            <p class="category">Revenue</p>
            <h3 class="title">$34,245</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>date_range</md-icon>
              Last 24 Hours
            </div>
          </template>
        </stats-card>
      </div>
    </div>
  </div>
</template>

<script>
import { PulseChart, StatsCard } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    PulseChart,
    StatsCard
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
      this.chartData.mobile = this.getPulse.mobile;
      this.chartData.desktop = this.getPulse.desktop;
      this.chartLabels = this.getPulse.labels;
      this.loaded = true;
  }
};
</script>

