import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { router } from "../main";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    editor: null
  },
  getters: {
    getPageContents(state) {
      return state.editor;
    }
  },
  mutations: {
    async SET_FILE_CONTENTS(state, data) {
      state.editor = data;
    }
  },
  actions: {
    async getFileContents({ dispatch }, filename) {
      try {
        let response = await axios.post("/api/editor/getfilecontents", filename);
        await dispatch("SavePageContents", response.data);
      } catch (e) {
        Vue.swal("Error", e.response.data.message, "error").then(result => {
          if (result.value) {
            router.go();
          }
        });
      }
    },
    async SavePageContents({ commit }, data) {
      await commit("SET_FILE_CONTENTS", data);
    }
  }
};
