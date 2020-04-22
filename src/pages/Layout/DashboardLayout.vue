<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <notifications></notifications>

    <side-bar>
      <mobile-menu slot="content"></mobile-menu>
      <sidebar-link to="/dashboard">
        <md-icon>dashboard</md-icon>
        <p>Dashboard</p>
      </sidebar-link>
      <sidebar-link to="/settings">
        <md-icon>build</md-icon>
        <p>Settings</p>
      </sidebar-link>
      <sidebar-link to="/pages">
        <md-icon>content_paste</md-icon>
        <p>Pages</p>
      </sidebar-link>
      <sidebar-link to="/images">
        <md-icon>image</md-icon>
        <p>Images</p>
      </sidebar-link>
      <sidebar-link to="/editor">
        <md-icon>post_add</md-icon>
        <p>Editor</p>
      </sidebar-link>
    </side-bar>

    <div class="main-panel">
      <top-navbar></top-navbar>

      <dashboard-content> </dashboard-content>

      <content-footer v-if="!$route.meta.hideFooter"></content-footer>
    </div>
  </div>
</template>
<style lang="scss"></style>
<script>
import TopNavbar from "./TopNavbar.vue";
import ContentFooter from "./ContentFooter.vue";
import DashboardContent from "./Content.vue";
import MobileMenu from "@/pages/Layout/MobileMenu.vue";

export default {
  components: {
    TopNavbar,
    DashboardContent,
    ContentFooter,
    MobileMenu
  }
};
</script>
