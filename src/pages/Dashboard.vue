<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
      >
        <chart-card
          v-if="loaded"
          :chart-data="ScansChart.data"
          :chart-options="ScansChart.options"
          :chart-type="'Bar'"
          data-background-color="green"
        >
          <template slot="content">
            <h4 class="title">{{$t(`pages.dashboard.charts.scans_chart.title`)}}</h4>
            <p class="category"></p>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>access_time</md-icon>
              {{$t(`pages.dashboard.charts.scans_chart.sub_1`)}} {{ ScansChart.storage.total_scans }} {{$t(`pages.dashboard.charts.scans_chart.sub_2`)}}.
            </div>
          </template>
        </chart-card>
      </div>
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
      >
        <chart-card
          v-if="loaded"
          :chart-data="ScansChart.data"
          :chart-options="ScansChart.options"
          :chart-responsive-options="ScansChart.responsiveOptions"
          :chart-type="'Bar'"
          data-background-color="red"
        >
          <template slot="content">
            <h4 class="title">{{$t(`pages.dashboard.charts.indev_chart.title`)}}</h4>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>access_time</md-icon>
              {{$t(`pages.dashboard.charts.scans_chart.sub_1`)}} {{ ScansChart.storage.total_scans }} {{$t(`pages.dashboard.charts.scans_chart.sub_2`)}}.
            </div>
          </template>
        </chart-card>
      </div>

      <div
        class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25"
      >
        <stats-card data-background-color="green">
          <template slot="header">
            <md-icon>receipt_long</md-icon>
          </template>

          <template slot="content">
            <p class="category">{{$t(`pages.dashboard.panels.active_websites_panel.title`)}}</p>
            <h3 class="title">{{ active_websites }}</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>date_range</md-icon>
              {{$t(`pages.dashboard.panels.active_websites_panel.sub`)}}
            </div>
          </template>
        </stats-card>
      </div>
      <div
        class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25"
      >
        <stats-card data-background-color="orange">
          <template slot="header">
            <md-icon>rotate_right</md-icon>
          </template>

          <template slot="content">
            <p class="category">{{$t(`pages.dashboard.panels.total_scans_panel.title`)}}</p>
            <h3 class="title">
              {{ total_scans }}
            </h3>
          </template>

          <template slot="footer">
            <div class="stats">
              {{$t(`pages.dashboard.panels.total_scans_panel.sub`)}}
              <span class="text-success"
                ><md-icon class="text-success">call_made</md-icon>
                {{ ScansChart.storage.total_scans }}</span
              >
            </div>
          </template>
        </stats-card>
      </div>
      <div
        class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25"
      >
        <stats-card data-background-color="red">
          <template slot="header">
            <md-icon>info_outline</md-icon>
          </template>

          <template slot="content">
            <p class="category">{{$t(`pages.dashboard.panels.under_development_panel.title`)}}</p>
            <h3 class="title">99999999</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>local_offer</md-icon>
              {{$t(`pages.dashboard.panels.under_development_panel.sub`)}}
            </div>
          </template>
        </stats-card>
      </div>
      <div
        class="md-layout-item md-medium-size-50 md-xsmall-size-100 md-size-25"
      >
        <stats-card data-background-color="blue">
          <template slot="header">
            <i class="fab fa-twitter"/>
          </template>

          <template slot="content">
            <p class="category">{{$t(`pages.dashboard.panels.under_development_panel.title`)}}</p>
            <h3 class="title">99999999</h3>
          </template>

          <template slot="footer">
            <div class="stats">
              <md-icon>update</md-icon>
              {{$t(`pages.dashboard.panels.under_development_panel.sub`)}}
            </div>
          </template>
        </stats-card>
      </div>
      <div
        v-if="show"
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
      >
        <md-card>
          <md-card-header data-background-color="orange">
            <h4 class="title">Employees Stats</h4>
            <p class="category">New employees on 15th September, 2016</p>
          </md-card-header>
          <md-card-content>
            <ordered-table table-header-color="orange"></ordered-table>
          </md-card-content>
        </md-card>
      </div>
      <div

        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-50"
      >
        <nav-tabs-card>
          <template slot="content">
            <span class="md-nav-tabs-title">Tasks:</span>
            <md-tabs class="md-success" md-alignment="left">
              <md-tab id="tab-home" md-label="Bugs" md-icon="bug_report">
                <nav-tabs-table></nav-tabs-table>
              </md-tab>

              <md-tab id="tab-pages" md-label="Website" md-icon="code">
                <nav-tabs-table></nav-tabs-table>
              </md-tab>

              <md-tab id="tab-posts" md-label="server" md-icon="cloud">
                <nav-tabs-table></nav-tabs-table>
              </md-tab>
            </md-tabs>
          </template>
        </nav-tabs-card>
      </div>
    </div>
  </div>
</template>

<script>
import {
  StatsCard,
  ChartCard,
  NavTabsCard,
  NavTabsTable,
  OrderedTable
} from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";

export default {
  components: {
    StatsCard,
    ChartCard,
    NavTabsCard,
    NavTabsTable,
    OrderedTable
  },
  data() {
    return {
      show: false,
      loaded: false,
      active_websites: 0,
      total_scans: 0,
      dailySalesChart: {
        data: {
          labels: ["M", "T", "W", "T", "F", "S", "S"],
          series: [[12, 17, 7, 17, 23, 18, 38]]
        },
        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 50, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          }
        }
      },
      dataCompletedTasksChart: {
        data: {
          labels: ["12am", "3pm", "6pm", "9pm", "12pm", "3am", "6am", "9am"],
          series: [[230, 750, 450, 300, 280, 240, 200, 190]]
        },
        options: {
          lineSmooth: this.$Chartist.Interpolation.cardinal({
            tension: 0
          }),
          low: 0,
          high: 1000, // creative tim: we recommend you to set the high sa the biggest value + something for a better look
          chartPadding: {
            top: 0,
            right: 0,
            bottom: 0,
            left: 0
          }
        }
      },
      ScansChart: {
        data: {
          labels: [],
          series: [[]]
        },
        options: {
          axisX: {
            showGrid: false
          },
          low: 0,
          high: 10,
          chartPadding: {
            top: 20,
            right: 5,
            bottom: 0,
            left: 0
          }
        },
        responsiveOptions: [
          [
            "screen and (max-width: 640px)",
            {
              seriesBarDistance: 5,
              axisX: {
                labelInterpolationFnc: function(value) {
                  return value[0];
                }
              }
            }
          ]
        ],
        storage: {
          total_scans: 0
        }
      }
    };
  },
  methods: {
    ...mapActions({
      requestDashboard: "dashboard/requestDashboard"
    })
  },
  computed: {
    ...mapGetters({
      getDashboard: "dashboard/getDashboard"
    })
  },
  async mounted() {
    this.loaded = false;
    await this.requestDashboard();
    let dashboard = await this.getDashboard;
    this.ScansChart.data.labels = dashboard.graph_scans.labels;
    this.ScansChart.data.series[0] = dashboard.graph_scans.values;
    this.ScansChart.options.high =
      dashboard.graph_scans.max + parseInt(dashboard.graph_scans.max * 0.5);
    this.ScansChart.storage.total_scans = dashboard.graph_scans.total_scans;
    this.active_websites = dashboard.active_websites;
    this.total_scans = dashboard.total_scans;
    this.loaded = true;
  }
};
</script>
