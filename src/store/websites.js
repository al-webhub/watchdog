import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);
import moment from 'moment';

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
                response.data.map(async item => {
                             item.score_mobile_class = scoreColor(item.scans[0].score_mobile);
                             item.score_desktop_class = scoreColor(item.scans[0].score_desktop);
                             item.last_scan_time = calcLastScanTime(item.scans[0].created_at);
                             return item;
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
        },
        async addWebsite({ dispatch }, website) {
            await axios.post('/api/websites/add', website);
            dispatch('requestWebsites', website.search);
        }
    }
};

function scoreColor(value) {
    let color = 'default';
    if (value > 0 && value <= 49) {
      color = 'red';
    }
    if (value >= 50 && value <= 89) {
      color = 'orange';
    }
    if (value >= 90 && value <= 100) {
      color = 'green';
    }
    return color;
}

function calcLastScanTime(value) {
    let now = moment();
    return moment.duration(now.diff(value)).asMinutes().toFixed(0);
}
