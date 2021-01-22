<template>
  <div class="wrapper" :class="{ 'nav-open': $sidebar.showSidebar }">
    <notifications></notifications>
    <side-bar>
      <mobile-menu slot="content"></mobile-menu>
      <sidebar-link to="/dashboard">
        <md-icon>dashboard</md-icon>
        <p>{{$t(`routes.dashboard`)}}</p>
      </sidebar-link>
      <sidebar-link to="/websites">
        <md-icon>web</md-icon>
        <p>{{$t(`routes.mywebsites`)}}</p>
      </sidebar-link>
      <sidebar-link v-if="user.role == 1" to="/users">
        <md-icon>account_box</md-icon>
        <p>{{$t(`routes.users`)}}</p>
      </sidebar-link>
      <sidebar-link to="/settings">
        <md-icon>build</md-icon>
        <p>{{$t(`routes.settings`)}}</p>
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
import { mapGetters } from "vuex";

export default {
  components: {
    TopNavbar,
    DashboardContent,
    ContentFooter,
    MobileMenu
  },
  computed: {
    ...mapGetters({
      user: "auth/getUser"
    })
  }
};
</script>

<style>
  body.swal2-shown > [aria-hidden="true"] {
    filter: blur(10px);
  }

  body > * {
    transition: 0.1s filter linear;
  }
</style>
