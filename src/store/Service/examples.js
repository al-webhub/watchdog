import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    examples: null
  },
  getters: {
    getExamples(state) {
      return state.examples;
    }
  },
  mutations: {
    SET_EXAMPLES(state, data) {
      state.examples = data;
    }
  },
  actions: {
    async requestExamples({ commit }) {
      let response = await axios.get("/api/examples/get");
      await commit("SET_EXAMPLES", response.data);
    },
    async addExample({ dispatch }, data) {
      await axios.post("/api/examples/add", data);
      await dispatch("requestExamples");
    },
    async deleteExample({ dispatch }, id) {
      await axios.delete("/api/examples/delete", {
        params: {
          id: id
        }
      });
      await dispatch("requestExamples");
    },
    async updateExample({ dispatch }, data) {
      await axios.put('/api/examples/update', data);
      await dispatch("requestExamples");
    }
  }
};

axios.interceptors.response.use(
  function(response) {
    return response;
  },
  function(error) {
    if (error.response.status === 422) {
      let valErrors = error.response.data.errors;
      let text = [];
      for (let valError in valErrors) {
        let temp =
          "<p><strong>" +
          valError.toUpperCase() +
          "</strong>" +
          " - " +
          valErrors[valError] +
          "</p>";
        text.push(temp);
      }
      text = text.join("");
      Vue.swal("Error", text, "error");
    }
    return Promise.reject(error);
  }
);
