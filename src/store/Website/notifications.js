import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    performance_budgets: {
      score: {
        budget: {
          desktop: 0,
          mobile: 0
        },
        channel: {
          email: false
        },
        data: {
          email: ""
        }
      },
      id: 0,
      website_id: 0
    }
  },
  getters: {
    getPFB(state) {
      return state.performance_budgets;
    }
  },
  mutations: {
    setPerformanceBudget(state, data) {
      state.performance_budgets = data;
    }
  },
  actions: {
    async savePerformanceBudget({ dispatch }, data) {
      try {
        await axios.post("/api/notification/save", data);
        dispatch("requestPerformanceBudget", data.website_id);
      } catch (error) {
        console.log(error);
      }
    },
    async updatePerformanceBudget({ dispatch }, data) {
      try {
        await axios.post('/api/notification/update', data);
        dispatch("requestPerformanceBudget", data.website_id);
      } catch (error) {
        console.log(error);
      }
    },
    async requestPerformanceBudget({ commit }, website_id) {
      try {
        const response = await axios.get(
          "/api/notification/getperformancebudget",
          {
            params: {
              website_id: website_id
            }
          }
        );
        commit("setPerformanceBudget", response.data);
      } catch (error) {
        console.log(error);
      }
    }
  }
};
