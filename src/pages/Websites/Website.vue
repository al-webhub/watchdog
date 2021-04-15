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
          <md-icon>av_timer</md-icon>{{ $t(`pages.website.pulse`) }}
        </md-button>
        <md-button v-on:click="getWeek" class="md-sm md-danger">
          <md-icon>view_week</md-icon> {{ $t(`pages.website.week`) }}
        </md-button>
        <md-button v-on:click="getMonth" class="md-sm md-danger">
          <md-icon>replay_30</md-icon> {{ $t(`pages.website.month`) }}
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
          <md-icon>insights</md-icon> {{ $t(`pages.website.fullscan_btn`) }}
        </md-button>
        <md-button
          v-on:click="
            $router.push({
              name: 'Parameters',
              params: { website_id: website_id }
            })
          "
          class="md-sm md-danger pull-right"
        >
          <md-icon>chevron_left</md-icon> {{ $t(`pages.website.params_btn`) }}
        </md-button>
      </div>
      <div
        class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
      >
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
            <md-button
              @click="showPerformanceBudgetDialog = true"
              :class="performanceButtonClass"
              ><md-icon>mail_outline</md-icon></md-button
            >
            <md-button
              v-if="performance_budget.id > 0"
              @click="confirmDeletePerformanceBudgetDialog = true"
              class="md-icon-button"
              ><md-icon>delete_forever</md-icon></md-button
            >
            <div style="margin-left: 15px;">Last scan: 9min ago</div>
          </template>
        </stats-card>
      </div>
      <div
        class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
      >
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

          <template slot="footer">
            <md-button class="md-icon-button md-primary"
              ><md-icon>mail_outline</md-icon></md-button
            >
            <div style="margin-left: 15px;">Last check: 299 sec ago</div>
          </template>
        </stats-card>
      </div>
      <div
        class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
      >
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

          <template slot="footer">
            <md-button class="md-icon-button md-primary"
              ><md-icon>mail_outline</md-icon></md-button
            >
            <div style="margin-left: 15px;">Last check: 299 sec ago</div>
          </template>
        </stats-card>
      </div>
      <div
        class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
      >
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

          <template slot="footer">
            <md-button class="md-icon-button md-primary"
              ><md-icon>mail_outline</md-icon></md-button
            >
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
      <md-dialog
        :md-active.sync="showPerformanceBudgetDialog"
        md-dynamic-height
      >
        <md-dialog-title
          >Performance budgets and notifications setup</md-dialog-title
        >
        <div class="md-layout">
          <div class="md-layout-item">
            <md-field>
              <md-input
                v-model="performance_budget.score.budget.mobile"
              ></md-input>
              <span class="md-helper-text">Mobile minimum value</span>
            </md-field>
            <md-field>
              <md-input
                v-model="performance_budget.score.budget.desktop"
              ></md-input>
              <span class="md-helper-text">Desktop minimum value</span>
            </md-field>
            <md-checkbox v-model="performance_budget.score.channel.email"
              >Email</md-checkbox
            >
            <md-field v-if="performance_budget.score.channel.email">
              <md-input
                type="email"
                v-model="performance_budget.score.data.email"
              ></md-input>
              <span class="md-helper-text">Email</span>
            </md-field>
          </div>
        </div>
        <md-dialog-actions>
          <md-button
            class="md-primary"
            @click="showPerformanceBudgetDialog = false"
            >Close</md-button
          >
          <md-button
            class="md-primary"
            v-if="performance_budget.id > 0"
            v-on:click="submitPerformanceBudgetUpdate"
            >Update</md-button
          >
          <md-button
            class="md-primary"
            v-else
            v-on:click="submitPerformanceBudgetSave"
            >Save</md-button
          >
        </md-dialog-actions>
      </md-dialog>
      <md-dialog-confirm
        :md-active.sync="confirmDeletePerformanceBudgetDialog"
        md-title="Warning"
        md-content="Are you sure want to delete performance budget notifications settings for this website?"
        md-confirm-text="Yes"
        md-cancel-text="No"
        @md-confirm="submitPerformanceBudgetDelete"
      />
      <md-snackbar
        class="md-snackbar-right"
        :md-position="snackbar.position"
        :md-duration="snackbar.duration"
        :md-active.sync="snackbar.show"
        md-persistent
      >
        <span>{{ snackbar.message }}</span>
      </md-snackbar>
    </div>
  </div>
</template>

<script>
import { PulseChart, StatsCard } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
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
      performance_budget: {
        score: {
          channel: {
            email: false
          },
          budget: {
            mobile: 0,
            desktop: 0
          },
          data: {
            email: null
          }
        },
        id: 0,
        website_id: this.website_id
      },
      chartData: [],
      chartLabels: [],
      loaded: false,
      time: null,
      website_id: 0,
      showPerformanceBudgetDialog: false,
      confirmDeletePerformanceBudgetDialog: false,
      snackbar: {
        position: "left",
        duration: 4000,
        show: false,
        message: ""
      }
    };
  },
  methods: {
    ...mapActions({
      requestPulse: "pulse/requestPulse",
      resetPulse: "pulse/resetPulse",
      requestWeek: "pulse/requestWeek",
      requestMonth: "pulse/requestMonth",
      requestRange: "pulse/requestRange",
      savePerformanceBudget: "notifications/savePerformanceBudget",
      updatePerformanceBudget: "notifications/updatePerformanceBudget",
      requestPerformanceBudget: "notifications/requestPerformanceBudget",
      deletePerformanceBudget: "notifications/deletePerformanceBudget"
    }),
    submitPerformanceBudgetSave: async function() {
      this.performance_budget.website_id = this.website_id;
      await this.savePerformanceBudget(this.performance_budget);
      await this.requestPerformanceBudget(this.website_id);
      this.performance_budget = this.getPFB;
      this.showPerformanceBudgetDialog = false;
      this.snackbar.message = "Created!";
      this.snackbar.show = true;
    },
    submitPerformanceBudgetDelete: async function() {
      this.performance_budget.website_id = this.website_id;
      await this.deletePerformanceBudget(this.performance_budget);
      await this.requestPerformanceBudget(this.website_id);
      this.performance_budget = this.getPFB;
      this.snackbar.message = "Deleted!";
      this.snackbar.show = true;
    },
    submitPerformanceBudgetUpdate: async function() {
      this.performance_budget.website_id = this.website_id;
      await this.updatePerformanceBudget(this.performance_budget);
      this.showPerformanceBudgetDialog = false;
      this.performance_budget = this.getPFB;
      this.snackbar.message = "Updated!";
      this.snackbar.show = true;
    },
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
      getPulse: "pulse/getPulse",
      getPFB: "notifications/getPFB"
    }),
    performanceButtonClass() {
      let base_class = "md-icon-button ";
      if (this.performance_budget.id > 0) {
        return base_class + "md-success";
      } else {
        return base_class + "md-primary";
      }
    }
  },
  async mounted() {
    this.loaded = false;
    let website_id = this.$route.params.website_id;
    this.website_id = website_id;
    await this.requestPulse(website_id);
    this.chartData = this.getPulse;
    this.chartLabels = this.getPulse.labels;
    this.loaded = true;
    // await this.requestPerformanceBudget(this.website_id);
    // this.performance_budget = this.getPFB;
  }
};
</script>

<style>
.daterangepicker_custom_position {
  margin: 10px 1px 10px 1px;
  height: 88px;
}

.md-snackbar-right {
  left: auto !important;
  right: 24px !important;
}
</style>
