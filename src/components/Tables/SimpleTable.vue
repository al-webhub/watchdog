<template>
  <div>
    <md-table v-model="texts" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="id">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="type">{{ item.type }}</md-table-cell>
        <md-table-cell md-label="value">{{ item.value }}</md-table-cell>
        <md-table-cell md-label="action"><md-button class="md-raised md-success"><md-icon>content_paste</md-icon></md-button></md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
export default {
  name: "simple-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: ""
    }
  },
  data() {
    return {
      texts: ""
    };
  }
};
</script>
