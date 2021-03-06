import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { router } from "../main.js";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    token: null,
    user: null,
    role: 0
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
      await dispatch("attempt", response.data.token);
      await dispatch("redirect", "/dashboard");
    },
    async attempt({ commit }, token) {
      commit("SET_TOKEN", token);
      try {
        let response = await axios.get("/api/auth/self");
        await commit("SET_USER", response.data);
      } catch (e) {
        commit("SET_TOKEN", null);
        commit("SET_USER", null);
        router.push("/").catch(err => {});
      }
    },
    logout({ commit }) {
      return axios.post("/api/auth/signout").then(() => {
        commit("SET_TOKEN", null);
        commit("SET_USER", null);
      });
    },
    async register({ dispatch }, data) {
      let response = await axios.post("/api/auth/register", data);
      dispatch("attempt", response.data.token);
    },
    async redirect({ dispatch }, to) {
      router.push(to).catch(err => {});
    }
  }
};
