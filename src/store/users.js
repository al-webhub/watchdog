import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    users: null
  },
  getters: {
    getUsers(state) {
      return state.users;
    }
  },
  mutations: {
    async SET_USERS(state, users) {
      state.users = users;
    }
  },
  actions: {
    async requestUsers({ commit }, search = "") {
      try {
        let response = await axios.get("/api/users/getusers", {
          params: {
            search: search
          }
        });
        await commit("SET_USERS", response.data);
      } catch (e) {
        await commit("SET_USERS", null);
      }
    },
    async deleteUser({ dispatch }, user) {
      await axios.post("/api/users/delete", user);
      dispatch("requestUsers", user.search);
    },
    async updateUser({ dispatch }, user) {
      await axios.post("/api/users/update", user);
      dispatch("requestUsers", user.search);
    }
  }
};
