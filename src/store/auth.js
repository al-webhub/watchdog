import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { router } from "../main.js";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    token: null,
    user: null
  },
  getters: {
    authenticated(state) {
      return state.token && state.user;
    },
    getUser(state) {
      return state.user;
    },
    getToken(state) {
      return state.token;
    }
  },
  mutations: {
    SET_TOKEN(state, token) {
      state.token = token;
    },
    async SET_USER(state, data) {
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
        let response = await axios.get("/api/auth/self");
        await commit("SET_USER", response.data);
        router.push("dashboard");
      } catch (e) {
        commit("SET_TOKEN", null);
        commit("SET_USER", null);
        router.push("login");
      }
    },
    logout({ commit }) {
      return axios.post("/api/auth/signout").then(() => {
        commit("SET_TOKEN", null);
        commit("SET_USER", null);
      });
    }
  }
};

axios.interceptors.response.use(
  function(response) {
    return response;
  },
  function(error) {
    if (
      error.response.status === 401 &&
      error.response.config.url == "/api/auth/signin"
    ) {
      Vue.swal("Error", "Wrong password", "error");
    }
    return Promise.reject(error);
  }
);
