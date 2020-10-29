<template>
  <div class="content">
    <div class="md-layout">
      <div
              class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-button to="/websites" class="md-sm md-danger">
          <md-icon>keyboard_backspace</md-icon>Back
        </md-button>
        <md-button v-on:click="getPulseChart" class="md-sm md-danger">
          <md-icon>av_timer</md-icon>Pulse
        </md-button>
        <md-button v-on:click="getWeek" class="md-sm md-danger">
          <md-icon>view_week</md-icon> This week
        </md-button>
        <md-button v-on:click="getMonth" class="md-sm md-danger">
          <md-icon>replay_30</md-icon> Last 30 days
        </md-button>
        <date-picker v-model="time"
                     valueType="format"
                     type="date"
                     range
                     placeholder="or select range"
                     class="daterangepicker_custom_position"
                     v-on:change="getCustomRange"
        >
        </date-picker>
      </div>
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
import DatePicker from 'vue2-datepicker';
import 'vue2-datepicker/index.css';

export default {
  components: {
    PulseChart,
    PulseParamsChart,
    DatePicker
  },
  data() {
    return {
      chartData: [],
      chartLabels: [],
      loaded: false,
      time: null,
      website_id: 0
    };
  },
  methods: {
    ...mapActions({
      requestPulse: "pulse/requestPulse",
      resetPulse: "pulse/resetPulse",
      requestWeek: "pulse/requestWeek",
      requestMonth: "pulse/requestMonth",
      requestRange: "pulse/requestRange"
    }),
    getWeek: async function() {
      this.loaded = false;
      await this.requestWeek(this.website_id);
      this.chartData = this.getPulse;
      this.chartLabels = this.getPulse.labels;
      this.loaded = true;
    },
    getMonth: async function() {
      this.loaded = false;
      await this.requestMonth(this.website_id);
      this.chartData = this.getPulse;
      this.chartLabels = this.getPulse.labels;
      this.loaded = true;
    },
    getPulseChart: async function() {
      this.loaded = false;
      await this.requestPulse(this.website_id);
      this.chartData = this.getPulse;
      this.chartLabels = this.getPulse.labels;
      this.loaded = true;
    },
    getCustomRange: async function() {
      this.loaded = false;
      let data = {
        'website_id': this.website_id,
        'time': this.time
      };
      await this.requestRange(data);
      this.chartData = this.getPulse;
      this.chartLabels = this.getPulse.labels;
      this.loaded = true;
    }
  },
  computed: {
    ...mapGetters({
      getPulse: "pulse/getPulse"
    })
  },
  async mounted() {
    this.loaded = false;
    let website_id = this.$route.params.website_id;
    this.website_id = website_id;
    await this.requestPulse(website_id);
    this.chartData = this.getPulse;
    this.chartLabels = this.getPulse.labels;
    this.loaded = true;
  }
};
</script>

<style>
  .daterangepicker_custom_position {
     margin: 10px 1px 10px 1px;
     height: 88px;
  }
</style>
