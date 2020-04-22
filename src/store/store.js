import Vue from "vue";
import Vuex from "vuex";
import auth from "./auth";
import settings from "./settings";
import pages from "./pages";
import editor from "./editor";
import images from "./images";
import createPersistedState from "vuex-persistedstate";

Vue.use(Vuex);

export default new Vuex.Store({
  state: {},
  mutations: {},
  actions: {},
  modules: {
    auth,
    settings,
    pages,
    images,
    editor
  },
  plugins: [createPersistedState()]
});
