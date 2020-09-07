import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
    state: {
        websites: null
    },
    getters: {
        getWebsites(state) {
            return state.websites;
        }
    },
    mutations: {
        async SET_WEBSITES(state, websites) {
            state.websites = websites;
        }
    },
    actions: {
        async requestWebsites({ commit }, search = '') {
            try {
                let response = await axios.get('/api/websites/getwebsites/', {
                    params: {
                        search: search
                    }
                });
                await commit('SET_WEBSITES', response.data);
            } catch (e) {
                await commit('SET_WEBSITES', null);
                Vue.swal("Error", "Unexpected Error!");
            }
        },
        async deleteWebsite({ dispatch }, website) {
            await axios.post('/api/websites/delete/', website);
            dispatch("requestWebsites", website.search);
        },
        async updateWebsite({ dispatch }, website) {
            await axios.post('/api/websites/update/', website);
            dispatch('requestWebsites', website.search);
        }
    }
};
