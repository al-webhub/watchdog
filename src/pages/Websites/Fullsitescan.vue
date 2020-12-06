<template>
  <div class="content" v-if="loaded">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-button
          v-on:click="
            $router.push({
              name: 'Analytics',
              params: { website_id: website_id }
            })
          "
          class="md-sm md-danger pull-left"
        >
          <md-icon>keyboard_backspace</md-icon> {{$t(`common.buttons.back`)}}
        </md-button>
        <div class="pull-right">
          <md-button v-on:click="deleteScan" class="md-sm md-danger btn-fix-margin">
            <md-icon>delete_forever</md-icon> {{$t(`common.buttons.delete`)}}
          </md-button>
          <md-button v-on:click="
            $router.push({
              name: 'FullscanAnalytics',
              params: { website_id: website_id }
            })
          " class="md-sm md-danger ">
            {{$t(`common.buttons.analytics`)}} <md-icon>trending_flat</md-icon>
          </md-button>
        </div>
      </div>
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
        v-if="empty"
      >
        <start-fullscan-form data-background-color="red"> </start-fullscan-form>
      </div>
      <div class="md-layout" v-else>
        <div
          class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
        >
          <stats-card data-background-color="red">
            <template slot="header">
              <md-icon>rotate_right</md-icon>
            </template>

            <template slot="content">
              <p class="category">{{$t(`fullscan.progress`)}}</p>
              <h3 class="title">
                {{ fullscan.processed }}/{{ fullscan.left }}
              </h3>
            </template>

            <template slot="footer">
              <div class="stats">
                {{$t(`fullscan.failed_label`)}}:
                <span class="text-danger">
                  <md-icon class="text-danger">call_made</md-icon>
                  {{ fullscan.failed }}</span
                >
              </div>
            </template>
          </stats-card>
        </div>
        <div
          class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
        >
          <stats-card data-background-color="red">
            <template slot="header">
              <md-icon>insights</md-icon>
            </template>

            <template slot="content">
              <p class="category">{{$t(`fullscan.avg_score`)}}:</p>
              <h3 class="title">
                <md-icon>phone_iphone</md-icon
                >{{ fullscan.avg_score_mobile }}&nbsp;<md-icon
                  >desktop_mac</md-icon
                >{{ fullscan.avg_score_desktop }}
              </h3>
            </template>

            <template slot="footer">
              <div class="stats">
                {{$t(`fullscan.max_label`)}}
                <span class="text-success">
                  <md-icon class="text-success">trending_up</md-icon
                  >{{ fullscan.max_score_mobile }}/{{
                    fullscan.max_score_desktop
                  }} </span
                >&nbsp;{{$t(`fullscan.min_label`)}}
                <span class="text-danger">
                  <md-icon class="text-danger">trending_down</md-icon
                  >{{ fullscan.min_score_mobile }}/{{
                    fullscan.min_score_desktop
                  }}
                </span>
              </div>
            </template>
          </stats-card>
        </div>
        <div
          class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
        >
          <stats-card data-background-color="red">
            <template slot="header">
              <md-icon>folder</md-icon>
            </template>

            <template slot="content">
              <p class="category">{{$t(`fullscan.avg_page_size`)}}</p>
              <h3 class="title">{{ fullscan.avg_page_size | prettyBytes }}</h3>
            </template>

            <template slot="footer">
              <div class="stats">
                <span title="Minimal page size" class="text-success"
                  ><md-icon class="text-success">trending_down</md-icon>
                  {{ fullscan.min_page_size_desktop | prettyBytes }}
                </span>
                <span title="Maximum page size" class="text-danger"
                  ><md-icon class="text-danger">trending_up</md-icon>
                  {{ fullscan.max_page_size_mobile | prettyBytes }}</span
                >
              </div>
            </template>
          </stats-card>
        </div>
        <div
          class="md-layout-item md-medium-size-25 md-xsmall-size-100 md-size-25"
        >
          <stats-card data-background-color="red">
            <template slot="header">
              <md-icon>warning</md-icon>
            </template>

            <template slot="content">
              <p class="category">{{$t(`fullscan.problem_pages`)}}</p>
              <h3 class="title">
                {{ fullscan.problem_pages }}
              </h3>
            </template>

            <template slot="footer">
              <div class="stats">
                <span class="text-primary">
                  300:
                  <span>{{ fullscan.redirect_pages }}</span>
                </span>
                <span class="text-warning">
                  400:
                  <span>{{ fullscan.not_found }}</span>
                </span>
                <span class="text-danger">
                  500:
                  <span>{{ fullscan.server_error }}</span>
                </span>
              </div>
            </template>
          </stats-card>
        </div>
        <div
          class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
          v-if="showtable"
        >
          <md-card class="md-card-plain">
            <md-card-header data-background-color="red">
              <div class="md-layout">
                <div
                  class="md-layout-item md-medium-size-70 md-xsmall-size-100 md-size-45"
                >
                  <h4 class="title">{{$t(`fullscan.table_title`)}}</h4>
                </div>
                <div
                  class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-15"
                >
                  <md-field>
                    <label>{{$t(`common.selects.filter`)}}:</label>
                    <md-select
                      v-model="filter"
                      name="filter"
                      v-on:input="goSearch"
                    >
                      <md-option value="score_mobile">Score mobile</md-option>
                      <md-option value="score_desktop">Score desktop</md-option>
                      <md-option value="response_code">Code</md-option>
                      <md-option value="fcp_mobile">FCP mobile</md-option>
                      <md-option value="fcp_desktop">FCP desktop</md-option>
                      <md-option value="si_mobile">SI mobile</md-option>
                      <md-option value="si_desktop">SI desktop</md-option>
                      <md-option value="tti_mobile">TTI mobile</md-option>
                      <md-option value="tti_desktop">TTI desktop</md-option>
                      <md-option value="tbt_mobile">TBT mobile</md-option>
                      <md-option value="tbt_mobile">TBT desktop</md-option>
                      <md-option value="cls_mobile">CLS mobile</md-option>
                      <md-option value="cls_desktop">CLS desktop</md-option>
                      <md-option value="ttfb_mobile">TTFB mobile</md-option>
                      <md-option value="ttfb_desktop">TTFB mobile</md-option>
                      <md-option value="tbw_mobile">TBW mobile</md-option>
                      <md-option value="tbw_desktop">TBW desktop</md-option>
                    </md-select>
                  </md-field>
                </div>
                <div
                  class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-10"
                >
                  <md-field>
                    <label>{{$t(`common.selects.sign`)}}:</label>
                    <md-select
                      v-model="param"
                      name="param"
                      v-on:input="goSearch"
                    >
                      <md-option value="="> &equals; </md-option>
                      <md-option value=">"> &gt; </md-option>
                      <md-option value="<"> &lt; </md-option>
                    </md-select>
                  </md-field>
                </div>
                <div
                  class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
                >
                  <md-field>
                    <label>{{$t(`common.inputs.search`)}}:</label>
                    <md-input v-model="search" v-on:keyup="goSearch" />
                  </md-field>
                </div>
              </div>
            </md-card-header>
            <md-card-content>
              <fullscans-table v-on:rescanUrl="goRescanUrl" :rows="fullscan.all.data" />
            </md-card-content>
            <md-card-header data-background-color="red" v-if="havepagination">
              <Pagination
                :data="pages"
                :current="page"
                v-on:changepage="toPage"
              />
            </md-card-header>
            <md-table-empty-state v-else>
              {{$t(`fullscan.empty_search`)}}
            </md-table-empty-state>

          </md-card>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapGetters } from "vuex";
import { mapActions } from "vuex";
import {
  FullscansTable,
  StartFullscanForm,
  StatsCard,
  Pagination
} from "@/components";
import Vue from "vue";

export default {
  components: {
    StartFullscanForm,
    StatsCard,
    FullscansTable,
    Pagination
  },
  data() {
    return {
      empty: true,
      loaded: false,
      time: null,
      website_id: 0,
      page: 1,
      search: "",
      filter: "",
      param: "",
      fullscan: null,
      showtable: false,
      havepagination: false,
      pages: [],
      rescan: null,
    };
  },
  methods: {
    ...mapActions({
      requestFullscan: "fullscan/requestFullscan",
      deleteScanByid: "fullscan/deleteScanByid",
      rescanUrl: "fullscan/rescanUrl"
    }),
    toPage: function(page) {
      this.page = page;
      this.refreshData();
    },
    goRescanUrl(item) {
      this.rescan = item;
      Vue.swal({
        title: "Please confirm",
        text: "Rescan can take up to 60 seconds",
        confirmButtonColor: "#4caf50",
        showLoaderOnConfirm: true,
        allowOutsideClick: () => !Swal.isLoading(),
        preConfirm: (item) => {
          return this.rescanUrl(this.rescan).then(function (result) {
            return true;
          });
        }
      }).then((result) => {
        if (result.isConfirmed) {
          this.refreshData();
          Swal.close();
        }
      });

    },
    goSearch: async function() {
      this.page = 1;
      let params = {
        website_id: this.website_id,
        page: this.page,
        search: this.search,
        filter: this.filter,
        params: this.param
      };
      await this.requestFullscan(params);
      this.fullscan = this.getFullscans;
      this.empty = this.fullscan.empty;
      this.refreshPagination();
    },
    deleteScan: async function() {
      Vue.swal({
        title: "Warning",
        text: "Are you sure want to delete fullscans?",
        showCancelButton: true,
        confirmButtonColor: "#4caf50",
        cancelButtonColor: "#f44336"
      }).then(result => {
        if (result.isConfirmed) {
          this.deleteScanByid(this.website_id);
          this.$router
            .push({
              name: "Analytics",
              params: { website_id: this.website_id }
            })
            .catch(err => {});
        }
      });
    },
    async refreshData() {
      this.website_id = this.$route.params.website_id;
      let params = {
        website_id: this.website_id,
        page: this.page
      };
      await this.requestFullscan(params);
      this.fullscan = this.getFullscans;
      this.empty = this.fullscan.empty;
      this.refreshPagination();
    },
    refreshPagination() {
      this.havepagination = false;
      if (this.fullscan !== null) {
        let pad = 5;
        let start = 1;
        if (this.page - pad > 0) {
          start = this.page - pad;
        }
        let end = pad;
        if (typeof this.fullscan.all !== "undefined") {
          if (this.fullscan.all.last_page > 1) {
            this.havepagination = true;
          }
          if (pad + this.page < this.fullscan.all.last_page) {
            end = this.page + pad;
          } else {
            end = this.fullscan.all.last_page;
          }
        }
        let range = (start, stop, step = 1) =>
          Array(stop - start)
            .fill(start)
            .map((x, y) => x + y * step);
        this.pages = range(start, end, 1);
      }
    }
  },
  computed: {
    ...mapGetters({
      getFullscans: "fullscan/getFullscan"
    })
  },
  async mounted() {
    this.loaded = false;
    this.website_id = this.$route.params.website_id;
    if (typeof this.$route.params.filter != "undefined") {
      this.filter = this.$route.params.filter;
    }
    if (typeof this.$route.params.search != "undefined") {
      this.search = this.$route.params.search;
    }
    if (typeof this.$route.params.params != "undefined") {
      this.params = this.$route.params.params;
    }
    let params = {
      website_id: this.website_id,
      filter: this.filter,
      params: this.params,
      search: this.search,
      page: this.page
    };
    await this.requestFullscan(params);
    this.fullscan = this.getFullscans;
    this.empty = this.fullscan.empty;
    this.refreshPagination();
    if (this.empty === false) {
      this.showtable = !(
        typeof this.fullscan.all.data === "undefined" ||
        this.fullscan.all.data.length === 0
      );
    }
    this.loaded = true;
  }
};
</script>

<style>
  .btn-fix-margin {
    margin-right: 10px;
  }
</style>
