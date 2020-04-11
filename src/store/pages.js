import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { router } from "../main";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    pages: null
  },
  getters: {
    getPages(state) {
      return state.pages;
    },
    getParsedPage(state) {
      return state.parsedpage;
    }
  },
  mutations: {
    async SET_PAGES(state, pages) {
      state.pages = pages;
    },
    async SET_PARSED_PAGE(state, page) {
      state.parsedpage = page;
    }
  },
  actions: {
    async ScanForPages({ commit }) {
      try {
        let response = await axios.get("/api/pages/scan/");
        await commit("SET_PAGES", response.data.pages);
      } catch (e) {
        commit("SET_PAGES", null);
        Vue.swal("Error", "Unexpeted Error! Error code: 100", "error");
      }
    },
    async ParsePage({ dispatch }, data) {
      try {
        let response = await axios.post("/api/pages/parsepagetext", data);
        dispatch("SaveParsedPage", response.data);
      } catch (e) {
        Vue.swal("Error", e.response.data.message, "error").then(result => {
          if (result.value) {
            router.go();
          }
        });
      }
    },
    async SaveParsedPage({ commit }, data) {
      commit("SET_PARSED_PAGE", data);
    }
  }
};
