// =========================================================
// * Vue Material Dashboard - v1.3.2
// =========================================================
//
// * Product Page: https://www.creative-tim.com/product/vue-material-dashboard
// * Copyright 2019 Creative Tim (https://www.creative-tim.com)
// * Licensed under MIT (https://github.com/creativetimofficial/vue-material-dashboard/blob/master/LICENSE.md)
//
// * Coded by Creative Tim
//
// =========================================================
//
// * The above copyright notice and this permission notice shall be included in all copies or substantial portions of the Software.

// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from "vue";
import VueRouter from "vue-router";
import App from "@/App";
// router setup
import routes from "@/routes/routes";
import store from "@/store/store";
import axios from "axios";
import VueSweetalert2 from 'vue-sweetalert2';
import 'sweetalert2/dist/sweetalert2.min.css';


// Move this subscribe to separate file
store.subscribe(mutation => {
  switch (mutation.type) {
    case "auth/SET_TOKEN":
      if (mutation.payload) {
        axios.defaults.headers.common[
          "Authorization"
        ] = `Bearer ${mutation.payload}`;
      } else {
        axios.defaults.headers.common["Authorization"] = null;
      }
      break;
  }
});

if (store.getters["auth/getToken"]) {
  store.dispatch("auth/attempt", store.getters["auth/getToken"]);
}
// Plugins
import GlobalComponents from "./globalComponents";
import GlobalDirectives from "./globalDirectives";
import Notifications from "./components/NotificationPlugin";
import moment from 'moment';

// MaterialDashboard plugin
import MaterialDashboard from "@/material-dashboard";

import Chartist from "chartist";

// configure router
export const router = new VueRouter({
  mode: "hash",
  base: "/landingly/",
  routes, // short for routes: routes
  linkExactActiveClass: "nav-item active"
});

router.beforeEach((to, from, next) => {
  if (to.meta.protected) {
    if (store.getters["auth/authenticated"]) {
      next();
    } else {
      next({
        name: "login"
      });
    }
  } else if (to.name == "login" && store.getters["auth/authenticated"]) {
    // redirect to dashboard
    next({
      name: "dashboard"
    });
  } else {
    next();
  }
});

Vue.prototype.$Chartist = Chartist;

Vue.use(VueRouter);
Vue.use(MaterialDashboard);
Vue.use(GlobalComponents);
Vue.use(GlobalDirectives);
Vue.use(Notifications);
Vue.use(VueSweetalert2);
/* eslint-disable no-new */
new Vue({
  el: "#app",
  render: h => h(App),
  router,
  store,
  data: {
    Chartist: Chartist
  }
});

Vue.filter('FormatDate', function (value) {
   if (value) {
     return moment(String(value)).format('DD.MM.YYYY kk:mm');
   }
});
document.title = 'Watchdog';
