<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-card class="md-card-plain">
          <md-card-header data-background-color="red">
            <h4 class="title">Registered users</h4>
          </md-card-header>
          <md-card-content >
            <users-table :rows="getUsers" ></users-table>
          </md-card-content>
        </md-card>

      </div>
    </div>
  </div>
</template>

<script>
import { UsersTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";


export default {
  components: {
      UsersTable
  },
  methods: {
      ...mapActions({
          requestUsers: "users/requestUsers"
      })
  },
  computed: {
      ...mapGetters({
          getUsers: "users/getUsers"
      })
  },
  created: function () {
      this.requestUsers();
  }
};
</script>
