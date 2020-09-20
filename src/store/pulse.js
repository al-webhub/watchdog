import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
    state: {
       pulse: null
    },
    getters: {
       getPulse(state) {
           return state.pulse;
       }
    },
    mutations: {
        async SET_PULSE(state, pulse) {
            state.pulse = pulse;
        }
    },
    actions: {
      async requestPulse({ commit }, website_id) {
          let response = await axios.get('/api/scans/getpulse', {
              params: {
                  website_id: website_id
              }
          });
          await commit('SET_PULSE', response.data);
      }
    },
    async resetPulse({ commit }) {
      await commit('SET_PULSE', null);
    }
};
