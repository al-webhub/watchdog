

// The Vue build version to load with the `import` command
// (runtime-only or standalone) has been set in webpack.base.conf with an alias.
import Vue from "vue";
import VueRouter from "vue-router";
import App from "@/App";
import vueFilterPrettyBytes from "vue-filter-pretty-bytes";
import VueParticles from 'vue-particles';
import VuePageTransition from 'vue-page-transition';
import VueTypedJs from 'vue-typed-js';
import Particles from "particles.vue";
import anime from "animejs";

// router setup
import routes from "@/routes/routes";
import store from "@/store/store";
import axios from "axios";
if (process.env.NODE_ENV === "production") {
  axios.defaults.baseURL = process.env.VUE_APP_BASE_URL;
}

import { ENGLISH_TRANSLATIONS } from "./translations/en";
import { RUSSIAN_TRANSLATIONS } from "./translations/ru";

import VueSweetalert2 from "vue-sweetalert2";
import "sweetalert2/dist/sweetalert2.min.css";

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
import moment from "moment";

// MaterialDashboard plugin
import MaterialDashboard from "@/material-dashboard";

import Chartist from "chartist";
import VueI18n from "vue-i18n";

// configure router
export const router = new VueRouter({
  mode: "history",
  scrollBehavior: function(to, from, savedPosition) {
    if (to.hash) {
      return {selector: to.hash};
    } else {
      return { x: 0, y: 0 };
    }
  },
  base: "/",
  routes, // short for routes: routes
  linkExactActiveClass: "nav-item active"
});

router.beforeEach((to, from, next) => {
  if (to.meta.protected) {
    if (store.getters["auth/authenticated"]) {
      next();
      if (to.meta.onlyadmin) {
        if (store.getters["auth/getUser"].role == 1) {
          next();
        } else {
          next({
            name: "dashboard"
          });
        }
      } else {
        next();
      }
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
Vue.prototype.$anime = anime;



Vue.use(VueRouter);
Vue.use(MaterialDashboard);
Vue.use(GlobalComponents);
Vue.use(GlobalDirectives);
Vue.use(Notifications);
Vue.use(VueSweetalert2);
Vue.use(VueI18n);
Vue.use(vueFilterPrettyBytes);
Vue.use(VueParticles);
Vue.use(VuePageTransition);
Vue.use(VueTypedJs);
Vue.use(Particles);


const TRANSLATIONS = {
  en: ENGLISH_TRANSLATIONS,
  ru: RUSSIAN_TRANSLATIONS
};
const i18n = new VueI18n({
  locale: "en",
  messages: TRANSLATIONS
});
/* eslint-disable no-new */
new Vue({
  el: "#app",
  render: h => h(App),
  router,
  store,
  i18n,
  data: {
    Chartist: Chartist
  }
});

Vue.filter("FormatDate", function(value) {
  if (value) {
    return moment(String(value)).format("DD.MM.YYYY");
  }
});

Vue.filter("round", function(value, decimals) {
  if (!value) {
    value = 0;
  }

  if (!decimals) {
    decimals = 0;
  }

  value = Math.round(value * Math.pow(10, decimals)) / Math.pow(10, decimals);
  return value;
});

document.title = "Watchdog";

axios.interceptors.response.use(
  function(response) {
    return response;
  },
  function(error) {
    if (
      error.response.status === 401 &&
      error.response.config.url == "/api/auth/signin"
    ) {
      let message = '<span style="color:white">'+i18n.t(`auth.errors.wrong_password`);+'</span>';
      Vue.swal({
        title: message,
        background: 'transparent',
        confirmButtonColor: 'transparent',
      });
    }
    return Promise.reject(error);
  }
);
