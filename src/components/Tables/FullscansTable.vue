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
        <md-table-cell md-label="SCORE">
          {{ item.score_desktop }}/{{ item.score_mobile }}
        </md-table-cell>
        <md-table-cell md-label="FCP">
          {{ item.fcp_desktop }}/{{ item.fcp_mobile }}
        </md-table-cell>
        <md-table-cell md-label="SI">
          {{ item.si_desktop }}/{{ item.si_mobile }}
        </md-table-cell>
        <md-table-cell md-label="TTI">
          {{ item.tti_desktop }}/{{ item.tti_mobile }}
        </md-table-cell>
        <md-table-cell md-label="TBT">
          {{ item.tbt_desktop }}/{{ item.tbt_mobile }}
        </md-table-cell>
        <md-table-cell md-label="CLS">
          {{ item.cls_desktop }}/{{ item.cls_mobile }}
        </md-table-cell>
        <md-table-cell md-label="TTFB">
          {{ item.ttfb_desktop }}/{{ item.ttfb_mobile }}
        </md-table-cell>
        <md-table-cell md-label="TBW">
          {{ item.tbw_desktop }}/{{ item.tbw_mobile }}
        </md-table-cell>
        <md-table-cell md-label="Controls" style="width:253px;">
          <md-button
            style="width: 75px;"
            class="md-sm md-danger"
            ><md-icon>arrow_right_alt</md-icon> Details</md-button>
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
  },
  methods: {}
};
</script>
