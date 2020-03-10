import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    token: null,
    user: null
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token;
    },
    SET_USER(state, data) {
      state.user = data;
    }
  },
  actions: {
    async signIn({ dispatch }, credentials) {
      let response = await axios.post("/api/auth/signin", credentials);
      dispatch("attempt", response.data.token);
    },

    async attempt({ commit }, token) {
      commit("SET_TOKEN", token);
      try {
        let response = await axios.get("/api/auth/self", {
          headers: {
            Authorization: "Bearer " + token
          }
        });
        commit("SET_USER", response.data);
      } catch (e) {
        commit("SET_TOKEN", null);
        commit("SET_USER", null);
      }
    }
  }
};
