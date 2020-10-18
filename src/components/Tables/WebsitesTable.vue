<template>
  <div>
    <md-table v-model="rows" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" style="width:10px;">{{
          item.id
        }}</md-table-cell>
        <md-table-cell md-label="Name" style="width: 150px;">{{
          item.name
        }}</md-table-cell>
        <md-table-cell md-label="Url">
          {{ item.url }}
        </md-table-cell>
        <md-table-cell md-label="Created at" style="width:125px;">{{
          item.created_at | FormatDate
        }}</md-table-cell>
        <md-table-cell md-label="Last scan" style="width:125px;"
          >{{ item.last_scan_time }} min ago</md-table-cell
        >
        <md-table-cell md-label="Last Score" style="min-width:100px;">
          <md-icon :style="{ color: item.score_mobile_class }"
            >tablet_mac</md-icon
          >
          {{ item.scans[0].score_mobile }}
          <md-icon :style="{ color: item.score_desktop_class }"
            >desktop_windows</md-icon
          >
          {{ item.scans[0].score_desktop }}
        </md-table-cell>
        <md-table-cell md-label="TTFB" style="width:120px;">
          <md-icon class="md-success">access_time</md-icon>
          {{ item.scans[0].ttfb_mobile }}
        </md-table-cell>
        <md-table-cell md-label="Scans" style="width:75px;">{{
          item.scans_count
        }}</md-table-cell>
        <md-table-cell md-label="Status" style="width: 75px;">
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
        <md-table-cell md-label="Controls" style="width:253px;">
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
            style="width: 75px;"
            class="md-sm md-primary"
            ><md-icon>arrow_right_alt</md-icon> Details</md-button
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
    rows: Array
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
