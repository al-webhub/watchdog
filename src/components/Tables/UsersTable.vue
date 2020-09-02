<template>
  <div>
    <md-table v-model="rows" :table-header-color="tableHeaderColor">
      <md-table-row slot="md-table-row" slot-scope="{ item }">
        <md-table-cell md-label="ID">{{ item.id }}</md-table-cell>
        <md-table-cell md-label="Name">{{ item.name }}</md-table-cell>
        <md-table-cell md-label="Email">{{ item.email }}</md-table-cell>
        <md-table-cell md-label="Priviligies">{{ item.priviligies }}</md-table-cell>
        <md-table-cell md-label="Controls">
          <md-button class="md-sm md-success pull-right">Edit</md-button>
          <md-button class="md-sm md-danger pull-right">Delete</md-button>
        </md-table-cell>
      </md-table-row>
    </md-table>
  </div>
</template>

<script>
export default {
  name: "users-table",
  props: {
    tableHeaderColor: {
      type: String,
      default: "red"
    },
    rows: Array,
  },
  data() {
    return {
      selected: [],
      users: [
        {
          id: 1,
          name: "Dakota 221212333Rice",
          email: "verylongemailnamejustcouoleletters.com",
          priviligies: "Admin"
        },
        {
          id: 2,
          name: "Minerva Hooper",
          email: "admin@admin.com",
          priviligies: "Webuser"
        }
      ]
    };
  }
};
</script>
