<template>
  <div class="content">
    <div class="md-layout">
      <div
        class="md-layout-item md-medium-size-100 md-xsmall-size-100 md-size-100"
      >
        <md-card class="md-card-plain">
          <md-card-header data-background-color="red">
            <div class="md-layout">
              <div
                class="md-layout-item md-medium-size-70 md-xsmall-size-100 md-size-70"
              >
                <h4 class="title">Monitored websites</h4>
              </div>
              <div
                class="md-layout-item md-medium-size-30 md-xsmall-size-100 md-size-30"
              >
                <md-field>
                  <label>Search:</label>
                  <md-input
                          v-model="websites.search"
                          v-on:keyup="search"
                  />
                </md-field>
              </div>
            </div>
          </md-card-header>
          <md-card-content>
            <websites-table></websites-table>
          </md-card-content>
        </md-card>
      </div>
    </div>
  </div>
</template>

<script>
import { WebsitesTable } from "@/components";
import { mapActions } from "vuex";
import { mapGetters } from "vuex";
import Vue from "vue";

export default {
  components: {
    WebsitesTable
  },
  data() {
    return {
      websites: {
        search: ""
      }
    };
  },
  methods: {
    ...mapActions({
       requestWebsites: "websites/requestWebsites",
    }),
    search() {
      this.requestWebsites(this.websites.search);
    }
  },
  computed: {
    ...mapGetters({
      getUsers: "users/getUsers"
    })
  },
  created: function() {
    this.requestWebsites(this.websites.search);
  }
};
</script>
