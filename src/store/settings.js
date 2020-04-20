import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {},
  getters: {},
  mutations: {},
  actions: {
    async updateProfile({ dispatch }, form) {
      let response = await axios.post(
        "/api/settings/profile/updateprofile",
        form
      );
      if (response.status === 200) {
        Vue.swal("Success", response.data.message, "success");
        this.dispatch("auth/attempt", this.getters["auth/getToken"]);
      }
    },
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
