import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { router } from "../main";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    images: null
  },
  getters: {
    async GetParsedPageImages(state) {
      return state.images;
    }
  },
  mutations: {
    async SET_PARSED_PAGE_IMAGES(state, data) {
      state.images = data;
    }
  },
  actions: {
    async ParsePageImages({ dispatch }, data) {
      try {
        let response = axios.post('/api/images/parsepageimages', data);
        dispatch('SetParsedPageImages', response.data);
      } catch (e) {
        Vue.swal("Error", e.response.data.message, "error").then(result => {
          if (result.value) {
            router.go();
          }
        });
      }
    },
    async SetParsedPageImages({ commit }, data) {
      commit("SET_PARSED_PAGE_IMAGES", data);
    }
  }
};
