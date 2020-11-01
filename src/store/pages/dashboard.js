import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    dashboard: null
  },
  getters: {
    async getDashboard(state) {
      return state.dashboard;
    }
  },
  mutations: {
    async SET_DASHBOARD(state, data) {
      state.dashboard = data;
    }
  },
  actions: {
    async requestDashboard({ commit }) {
      let response = await axios.get("/api/pages/dashboard/getadmindashboard");
      await commit("SET_DASHBOARD", response.data);
    }
  }
};
