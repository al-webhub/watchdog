<template>
  <div>
    <md-table v-model="rows" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" style="width:10px;">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Name">{{ item.url }}</md-table-cell>
        <md-table-cell md-label="Scan interval">{{ item.scan_time }}</md-table-cell>
        <md-table-cell md-label="Last Scan">{{ item.last_scan }}</md-table-cell>
        <md-table-cell md-label="Controls"  style="width:100px;">
          <md-button v-on:click="$emit('editModal',item)"  class="md-sm md-success md-icon md-icon-font pull-right"><md-icon>settings</md-icon></md-button>
          <md-button v-on:click="$emit('confirmDeleteModal', item)" class="md-sm md-danger md-icon md-icon-font pull-right"><md-icon>delete</md-icon></md-button>
        </md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>


<script>
export default {
  name: "example-settings-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: "red"
    },
    rows: Array
  }
};
</script>
