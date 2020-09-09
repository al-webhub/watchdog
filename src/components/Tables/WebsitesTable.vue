<template>
  <div>
    <md-table v-model="rows" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID" style="width:10px;">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Name"  style="width: 150px;">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Url" > {{ item.url }}</md-table-cell>
        <md-table-cell md-label="Created at" style="width:175px;">{{ item.created_at | formatDate }}</md-table-cell>
        <md-table-cell md-label="Last scan" style="width:175px;">24.04.2020</md-table-cell>
        <md-table-cell md-label="Last Score" style="min-width:150px;">
          <md-icon class="md-success">tablet_mac</md-icon> 100
          <md-icon class="md-success">desktop_windows</md-icon> 100
        </md-table-cell>
        <md-table-cell md-label="Average Score" style="width:120px;">
          <md-icon class="md-success">tablet_mac</md-icon> 100
          <md-icon class="md-success">desktop_windows</md-icon> 100
        </md-table-cell>
        <md-table-cell md-label="Scans" class="text-center" style="width:75px;">9999</md-table-cell>
        <md-table-cell md-label="Status" style="width: 75px;">
          <md-button v-if="item.active == 1" class="md-sm md-success" v-on:click="$emit('toggleActive', item)">Active</md-button>
          <md-button v-else class="md-sm md-danger" v-on:click="$emit('toggleActive', item)">Offline</md-button>
        </md-table-cell>
        <md-table-cell md-label="Controls"  style="width:253px;">
          <md-button v-on:click="$emit('ShowEditModal', item)" class="md-sm md-success md-icon md-icon-font"><md-icon>settings</md-icon></md-button>
          <md-button v-on:click="$emit('ShowDeleteModal', item)" class="md-sm md-danger md-icon md-icon-font"><md-icon>delete</md-icon></md-button>
          <md-button style="width: 75px;" class="md-sm md-primary"><md-icon>arrow_right_alt</md-icon> Details</md-button>
        </md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>


<script>
import moment from 'moment';

export default {
  name: "websites-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: "red"
    },
    rows: Array,
  },
  computed: {

  }
};
</script>
