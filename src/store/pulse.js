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
        async requestPulse({commit}, website_id) {
            let response = await axios.get('/api/scans/getpulse', {
                params: {
                    website_id: website_id
                }
            });
            await commit('SET_PULSE', response.data);
        },
        async requestWeek({commit}, website_id) {
            await commit('SET_PULSE', null);
            let response = await axios.get('/api/scans/getweek', {
                params: {
                    website_id: website_id
                }
            });
            await commit('SET_PULSE', response.data);
        },
        async requestMonth({commit}, website_id) {
            await commit('SET_PULSE', null);
            let response = await axios.get('/api/scans/getmonth', {
                params: {
                    website_id: website_id
                }
            });
            await commit('SET_PULSE', response.data);
        },
        async requestRange({commit}, data) {
            await commit('SET_PULSE', null);
            let response = await axios.get('/api/scans/getrange', {
                params: {
                    website_id: data.website_id,
                    range: data.time
                }
            });
            await commit('SET_PULSE', response.data);
        },
        async resetPulse({commit}) {
            await commit('SET_PULSE', null);
        }
    }
};
