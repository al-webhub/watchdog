import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);
import moment from "moment";

export default {
  namespaced: true,
  state: {
    fullscans: null
  },
  getters: {
    getFullscan(state) {
      return state.fullscans;
    }
  },
  mutations: {
    async SET_FULLSCANS(state, fullscans) {
      state.fullscans = fullscans;
    }
  },
  actions: {
    async startScan({ commit }, data) {
      let response = await axios.post("/api/fss/start", data);
      await commit("SET_FULLSCANS", response.data);
    },
    async requestFullscan({commit}, params) {
      let response = await axios.get('/api/fss/get', {
        params: {
          page: params.page,
          website_id: params.website_id,
          search: params.search,
          filter: params.filter,
          params: params.params
        }
      });
      await commit("SET_FULLSCANS", response.data);
    },
    async deleteScanByid({dispatch}, website_id) {
      let response = await axios.post('/api/fss/delete', {
        website_id: website_id
      });
      let params = {
        page: 1,
        website_id: website_id,
        search: ""
      };
      dispatch("requestFullscan", params);
    }
  }
};

axios.interceptors.response.use(
    function(response) {
      return response;
    },
    function(error) {
      if (
          error.response.status === 404
      ) {
        Vue.swal("Error", "Website not found, or wrong permissions", "error");
      }
      return Promise.reject(error);
    }
);
