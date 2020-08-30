import Vue from "vue";
import Vuex from "vuex";
import auth from "./auth";
import settings from "./settings";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    auth,
    settings
  },
  plugins: [createPersistedState()]
});
