import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";
import { router } from "../main";

Vue.use(Vuex);

export default {
  namespaced: true,
  state: {
    editor: null,
    lastModified: ''
  },
  getters: {
    getPageContents(state) {
      return state.editor;
    },
    getPageLastModified(state) {
      return state.lastModified;
    }
  },
  mutations: {
    async SET_FILE_CONTENTS(state, data) {
      state.editor = data;
    },
    async SET_LAST_MODIFIED(state, data) {
      console.log('in muatation');
      state.lastModified = data;
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
    },
    async updateFileContents({ dispatch }, data) {
      try {
        let response = await axios.post('/api/editor/updatefilecontents', data);
        dispatch('updateLastModified', response.data.message);
      } catch (e) {
        Vue.swal("Error", e.response.data.message, "error").then(result => {
          if (result.value) {
            router.go();
          }
        });
      }
    },
    async updateLastModified({ commit }, date) {
      console.log(date);
        await commit("SET_LAST_MODIFIED", date);
    }
  }
};
