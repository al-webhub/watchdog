import Vue from "vue";
import Vuex from "vuex";
import auth from "./auth";
import settings from "./settings";
import users from "./users";

import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  modules: {
    auth,
    settings,
    users
  },
  plugins: [createPersistedState()]
});
