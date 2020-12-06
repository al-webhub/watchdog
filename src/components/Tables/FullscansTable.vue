<template>
  <div>
    <md-table v-model="rows" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" style="width:10px;">{{
          item.id
        }}</md-table-cell>
        <md-table-cell md-label="Url">
          {{ item.url }}
        </md-table-cell>
        <md-table-cell md-label="CODE">
          {{ item.response_code }}
        </md-table-cell>
        <md-table-cell md-label="SCORE" style="min-width: 70px">
          <md-icon :style="{ color: item.score_desktop_class }"
            >desktop_windows</md-icon
          >
          {{ item.score_desktop }}<br />
          <md-icon :style="{ color: item.score_mobile_class }"
            >phone_iphone</md-icon
          >
          {{ item.score_mobile }}
        </md-table-cell>
        <md-table-cell md-label="FCP">
          <span :style="{ color: item.fcp_desktop_class }">{{
            item.fcp_desktop
          }}</span>
          <br />
          <span :style="{ color: item.fcp_mobile_class }">{{
            item.fcp_mobile
          }}</span>
        </md-table-cell>
        <md-table-cell md-label="SI">
          <span :style="{ color: item.si_desktop_class }">{{
            item.si_desktop
          }}</span>
          <br />
          <span :style="{ color: item.si_mobile_class }">{{
            item.si_mobile
          }}</span>
        </md-table-cell>
        <md-table-cell md-label="TTI">
          <span :style="{ color: item.tti_desktop_class }">{{
            item.tti_desktop
          }}</span>
          <br />
          <span :style="{ color: item.tti_mobile_class }">{{
            item.tti_mobile
          }}</span>
        </md-table-cell>
        <md-table-cell md-label="TBT">
          <span :style="{ color: item.tbt_desktop_class }">{{
            item.tbt_desktop
          }}</span>
          <br />
          <span :style="{ color: item.tbt_mobile_class }">{{
            item.tbt_mobile
          }}</span>
        </md-table-cell>
        <md-table-cell md-label="CLS">
          <span :style="{ color: item.cls_mobile_class }">{{
            item.cls_desktop | round(3)
          }}</span>
          <br />
          <span :style="{ color: item.cls_mobile_class }">{{
            item.cls_mobile | round(3)
          }}</span>
        </md-table-cell>
        <md-table-cell md-label="TTFB">
          {{ item.ttfb_desktop }}<br />{{ item.ttfb_mobile }}
        </md-table-cell>
        <md-table-cell md-label="TBW">
          {{ item.tbw_desktop | prettyBytes }} <br />
          {{ item.tbw_mobile | prettyBytes }}
        </md-table-cell>
        <md-table-cell md-label="Controls" style="width:110px;">
          <md-button
            :disabled="item.buttonDisabled"
            v-on:click="$emit('rescanUrl', item)"
            style="width: 75px;"
            class="md-sm md-danger"
            ><md-icon>refresh</md-icon>  {{$t(`common.buttons.rescan`)}}</md-button
          >
        </md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
export default {
  name: "fullscans-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: "red"
    },
    rows: Array
  }
};
</script>
