<template>
  <md-toolbar md-elevation="0" class="md-transparent">
    <div class="md-toolbar-row">
      <div class="md-toolbar-section-start">
        <h3 class="md-title">{{ title }}</h3>
      </div>
      <div class="md-toolbar-section-end">
        <md-button
          class="md-just-icon md-simple md-toolbar-toggle"
          :class="{ toggled: $sidebar.showSidebar }"
          @click="toggleSidebar"
        >
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
          <span class="icon-bar"></span>
        </md-button>

        <div class="md-collapse">
          <md-list>
            <md-list-item @click.prevent="logoutAction">
              <i class="material-icons">exit_to_app</i>
            </md-list-item>
          </md-list>
        </div>
      </div>
    </div>
  </md-toolbar>
</template>

<script>
import { mapActions } from "vuex";
export default {
  data() {
    return {
      selectedEmployee: null,
      employees: [
        "Jim Halpert",
        "Dwight Schrute",
        "Michael Scott",
        "Pam Beesly",
        "Angela Martin",
        "Kelly Kapoor",
        "Ryan Howard",
        "Kevin Malone"
      ]
    };
  },
  methods: {
    ...mapActions({
      logout: "auth/logout"
    }),
    logoutAction() {
      this.logout().then(() => {
        this.$router.push("/").catch(err => {});
      });
    },
    toggleSidebar() {
      this.$sidebar.displaySidebar(!this.$sidebar.showSidebar);
    }
  },
  computed: {
    title() {
      let path = 'routes.'+this.$route.name;
      return this.$i18n.t(path);
    }
  }
};
</script>

<style lang="css"></style>
