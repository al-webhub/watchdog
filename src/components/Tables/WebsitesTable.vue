<template>
  <div>
    <md-table v-model="rows" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell :md-label="cols.id" style="width:10px;">{{
          item.id
        }}</md-table-cell>

        <md-table-cell style="width: 350px;" :md-label="cols.url">
          {{ item.url }}
        </md-table-cell>
        <md-table-cell :md-label="cols.created_at" style="width:125px;">{{
          item.created_at | FormatDate
        }}</md-table-cell>
        <md-table-cell :md-label="cols.last_scan" style="width:125px;"
          >{{ item.last_scan_time }} min ago</md-table-cell
        >
        <md-table-cell :md-label="cols.last_score" style="min-width:100px;">
          <md-icon :style="{ color: item.score_mobile_class }"
            >tablet_mac</md-icon
          >
          {{ item.scans[0].score_mobile }}
          <md-icon :style="{ color: item.score_desktop_class }"
            >desktop_windows</md-icon
          >
          {{ item.scans[0].score_desktop }}
        </md-table-cell>
        <md-table-cell :md-label="cols.ttfb" style="width:120px;">
          <md-icon class="md-success">access_time</md-icon>
          {{ item.scans[0].ttfb_mobile }}
        </md-table-cell>
        <md-table-cell :md-label="cols.scans" style="width:75px;">{{
          item.scans_count
        }}</md-table-cell>
        <md-table-cell :md-label="cols.status" style="width: 75px;">
          <md-button
            v-if="item.active == 1"
            class="md-sm md-success"
            v-on:click="$emit('toggleActive', item)"
            >Active</md-button
          >
          <md-button
            v-else
            class="md-sm md-danger"
            v-on:click="$emit('toggleActive', item)"
            >Offline</md-button
          >
        </md-table-cell>
        <md-table-cell :md-label="cols.controls" style="width:253px;">
          <md-button
            v-on:click="$emit('ShowEditModal', item)"
            class="md-sm md-success md-icon md-icon-font"
            ><md-icon>settings</md-icon></md-button
          >
          <md-button
            v-on:click="$emit('ShowDeleteModal', item)"
            class="md-sm md-danger md-icon md-icon-font"
            ><md-icon>delete</md-icon></md-button
          >
          <md-button
            v-on:click="$router.push({name: 'Analytics',params: { website_id: item.id }})
            "
            style="width: 105px;"
            class="md-sm md-primary"
            ><md-icon>arrow_right_alt</md-icon> {{ cols.details_btn }}</md-button
          >
        </md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
export default {
  name: "websites-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: "red"
    },
    rows: Array,
  },
  data() {
    return {
      cols: {
        id: this.$i18n.t(`pages.websites.table.id`),
        name: this.$i18n.t(`pages.websites.table.name`),
        url: this.$i18n.t(`pages.websites.table.url`),
        created_at: this.$i18n.t(`pages.websites.table.created_at`),
        last_scan: this.$i18n.t(`pages.websites.table.last_scan`),
        last_score: this.$i18n.t(`pages.websites.table.last_score`),
        ttfb: this.$i18n.t(`pages.websites.table.ttfb`),
        scans: this.$i18n.t(`pages.websites.table.scans`),
        status: this.$i18n.t(`pages.websites.table.status`),
        controls: this.$i18n.t(`pages.websites.table.controls`),
        details_btn: this.$i18n.t(`pages.websites.table.details_btn`)
      }
    };
  },
  methods: {
    ping(url) {
      this.check(url)
        .then(function(time) {
          return time;
        }).catch(function (error) {
          return null;
        });
    },
    check(url) {
      return new Promise(function(resolve, reject) {
        let start = new Date().getTime();
        let response = function() {
          let delta = new Date().getTime() - start;
          // HACK: Use a fudge factor to correct the ping for HTTP bulk.
          delta /= 4;
          resolve(delta);
        };
        const image = new Promise(function(resolve, reject) {
          let img = new Image();
          img.onload = function() {
            resolve(img);
          };
          img.onerror = function() {
            reject(url);
          };
          img.src =
            url +
            "?random-no-cache=" +
            Math.floor((1 + Math.random()) * 0x10000).toString(16);
        });
        image.then(response).catch(response);

        setTimeout(function() {
          reject(Error("Timeout"));
        }, 5000);
      });
    },
    RequestImage(url) {
      return new Promise(function(resolve, reject) {
        let img = new Image();
        img.onload = function() {
          resolve(img);
        };
        img.onerror = function() {
          reject(url);
        };
        img.src =
          url +
          "?random-no-cache=" +
          Math.floor((1 + Math.random()) * 0x10000).toString(16);
      });
    }
  }
};
</script>
