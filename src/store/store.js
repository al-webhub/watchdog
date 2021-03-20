import Vue from "vue";
import Vuex from "vuex";
import auth from "./auth";
import settings from "./settings";
import users from "./users";
import websites from "./websites";
import pulse from "./pulse";
import fullscan from "./fullscan";
// Pages
import dashboard from "./pages/dashboard";

import examples from "./Service/examples";
import notifications from "./Website/notifications";

import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth,
    settings,
    users,
    websites,
    pulse,
    dashboard,
    fullscan,
    examples,
    notifications
  },
  plugins: [createPersistedState()]
});
