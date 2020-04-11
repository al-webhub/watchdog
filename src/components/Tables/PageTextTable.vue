<template>
  <div>
    <md-table v-model="rows">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell class="set_width_5_percent" md-label="id">{{
          item.id
        }}</md-table-cell>
        <md-table-cell class="set_width_5_percent" md-label="type"
          ><b>{{ item.type }}</b></md-table-cell
        >
        <md-table-cell md-label="value">{{ item.value }}</md-table-cell>
        <md-table-cell class="set_width_10_percent" md-label="action"
          ><md-button
            data-id=""
            v-on:click="$emit('getEditTextModal', item)"
            class=" md-success"
            ><md-icon>content_paste</md-icon></md-button
          ></md-table-cell
        >
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
import Vue from "vue";

export default {
  name: "PageTextTable",
  props: {
    rows: Array
  }
};
</script>

<style scoped>
.set_width_10_percent {
  width: 10%;
}
.set_width_5_percent {
  width: 5%;
}
</style>
