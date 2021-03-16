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
          <md-icon>av_timer</md-icon>{{$t(`pages.website.pulse`)}}
        </md-button>
        <md-button v-on:click="getWeek" class="md-sm md-danger">
          <md-icon>view_week</md-icon> {{$t(`pages.website.week`)}}
        </md-button>
        <md-button v-on:click="getMonth" class="md-sm md-danger">
          <md-icon>replay_30</md-icon> {{$t(`pages.website.month`)}}
        </md-button>
        <date-picker
          v-model="time"
          valueType="format"
          type="date"
          range
          v-bind:placeholder="$t(`pages.website.range`)"
          class="daterangepicker_custom_position"
          v-on:change="getCustomRange"
        >
        </date-picker>
        <md-button
          v-on:click="
            $router.push({
              name: 'Fullsitescan',
              params: { website_id: website_id }
            })
          "
          class="md-sm md-danger pull-right"
        >
          <md-icon>insights</md-icon> {{$t(`pages.website.fullscan_btn`)}}
        </md-button>
        <md-button  v-on:click="$router.push({name: 'Parameters', params: { website_id: website_id }})"
                    class="md-sm md-danger pull-right">
          <md-icon>chevron_left</md-icon> {{$t(`pages.website.params_btn`)}}
        </md-button>
      </div>
      <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="red">
          <template slot="header">
            <md-icon>star_rate</md-icon>
          </template>

          <template slot="content">
            <p class="category">Average score</p>
            <h3 class="title">
              <md-icon>phone_iphone</md-icon>100
              <md-icon>desktop_mac</md-icon>100
            </h3>
          </template>

          <template slot="footer">
            <md-button title="Setup notifications and performance budgets" class="md-icon-button md-primary"><md-icon>mail_outline</md-icon></md-button>
            <div style="margin-left: 15px;">Last check: 299 sec ago</div>
          </template>
        </stats-card>
      </div>
      <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="red">
          <template slot="header">
            <md-icon>access_time</md-icon>
          </template>

          <template slot="content">
            <p class="category">Uptime monitor</p>
            <h3 class="title">
              10d 23:59
            </h3>
          </template>

          <template  slot="footer">
            <md-button class="md-icon-button md-primary"><md-icon>mail_outline</md-icon></md-button>
            <div style="margin-left: 15px;">Last check: 299 sec ago</div>
          </template>
        </stats-card>
      </div>
      <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="red">
          <template slot="header">
            <md-icon>shield</md-icon>
          </template>

          <template slot="content">
            <p class="category">SSL Checker</p>
            <h3 class="title">
              EXPIRED
            </h3>
          </template>

          <template  slot="footer">
            <md-button class="md-icon-button md-primary"><md-icon>mail_outline</md-icon></md-button>
            <div style="margin-left: 15px;">Last check: 299 sec ago</div>
          </template>
        </stats-card>
      </div>
      <div class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25">
        <stats-card data-background-color="red">
          <template slot="header">
            <md-icon>dns</md-icon>
          </template>

          <template slot="content">
            <p class="category">Domain monitor</p>
            <h3 class="title">
              379 days
            </h3>
          </template>

          <template  slot="footer">
            <md-button class="md-icon-button md-primary"><md-icon>mail_outline</md-icon></md-button>
            <div style="margin-left: 15px;">Last check: 299 sec ago</div>
          </template>
        </stats-card>
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
    </div>
  </div>
</template>

<script>
import { PulseChart, StatsCard } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";
import DatePicker from "vue2-datepicker";
import "vue2-datepicker/index.css";

export default {
  components: {
    PulseChart,
    StatsCard,
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
        website_id: this.website_id,
        time: this.time
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
