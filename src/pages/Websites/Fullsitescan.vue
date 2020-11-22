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
          <md-icon>keyboard_backspace</md-icon> Back
        </md-button>
        <md-button v-on:click="deleteScan" class="md-sm md-danger pull-right">
          <md-icon>delete_forever</md-icon> Delete
        </md-button>
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
              <p class="category">Progress</p>
              <h3 class="title">
                {{ fullscan.processed }}/{{ fullscan.left }}
              </h3>
            </template>

            <template slot="footer">
              <div class="stats">
                Failed:
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
              <p class="category">Average score</p>
              <h3 class="title">
                <md-icon>phone_iphone</md-icon
                >{{ fullscan.avg_score_mobile }}&nbsp;<md-icon
                  >desktop_mac</md-icon
                >{{ fullscan.avg_score_desktop }}
              </h3>
            </template>

            <template slot="footer">
              <div class="stats">
                Max:
                <span class="text-success">
                  <md-icon class="text-success">trending_up</md-icon
                  >{{ fullscan.max_score_mobile }}/{{
                    fullscan.max_score_desktop
                  }} </span
                >&nbsp; Min:
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
              <p class="category">Average page size</p>
              <h3 class="title">{{ fullscan.avg_page_size }} Kb</h3>
            </template>

            <template slot="footer">
              <div class="stats">
                <span title="Minimal page size" class="text-success"
                  ><md-icon class="text-success">trending_down</md-icon>
                  {{ fullscan.min_page_size_mobile }}/{{
                    fullscan.min_page_size_desktop
                  }}
                  Kb
                </span>
                <span title="Maximum page size" class="text-danger"
                  ><md-icon class="text-danger">trending_up</md-icon>
                  {{ fullscan.max_page_size_mobile }}/{{
                    fullscan.max_page_size_desktop
                  }}
                  Kb</span
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
              <p class="category">Page with problems</p>
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
          class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100" v-if="showtable"
        >
          <md-card class="md-card-plain">
            <md-card-header data-background-color="red">
              <div class="md-layout">
                <div
                  class="md-layout-item md-medium-size-70 md-xsmall-size-100 md-size-70"
                >
                  <h4 class="title">Scan results</h4>
                </div>
                <div
                  class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
                >
                  <md-field>
                    <label>Search:</label>
                    <md-input v-model="search" v-on:keyup="goSearch" />
                  </md-field>
                </div>
              </div>
            </md-card-header>
            <md-card-content>
              <fullscans-table :rows="fullscan.all.data" />
            </md-card-content>
            <md-card-header data-background-color="red">
              <Pagination
                :data="pages"
                :current="page"
                v-on:changepage="toPage"
              />
            </md-card-header>
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
      fullscan: null,
      showtable: false,
      pages: []
    };
  },
  methods: {
    ...mapActions({
      requestFullscan: "fullscan/requestFullscan",
      deleteScanByid: "fullscan/deleteScanByid"
    }),
    toPage: function(page) {
      this.page = page;
      this.refreshData();
    },
    goSearch: async function() {
      this.page = 1;
      let params = {
        website_id: this.website_id,
        page: this.page,
        search: this.search
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
      if (this.fullscan !== null) {
        let pad = 5;
        let start = 1;
        if (this.page - pad > 0) {
          start = this.page - pad;
        }
        let end = this.fullscan.all.last_page;
        if (pad + this.page < end) {
          end = this.page + pad;
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
    let params = {
      website_id: this.website_id,
      page: this.page
    };
    await this.requestFullscan(params);
    this.fullscan = this.getFullscans;
    this.empty = this.fullscan.empty;
    this.refreshPagination();
    if (this.empty === false) {
      if (typeof this.fullscan.all.data === 'undefined' || this.fullscan.all.data.length === 0) {
        this.showtable = false;
      } else {
        this.showtable = true;
      }
    }

    this.loaded = true;
  }
};
</script>
