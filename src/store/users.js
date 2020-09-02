import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);

export default {
  namespaced: true,
    state: {
        users: null
    },
    getters: {
        getUsers(state) {
            return state.users;
        }
    },
    mutations: {
        async SET_USERS(state, users) {
            state.users = users;
        }
    },
    actions: {
        async requestUsers({ commit }) {
            try {
                let response = await axios.get('/api/users/getusers/');
                await commit('SET_USERS', response.data);
            } catch (e) {
                await commit('SET_USERS', null);
                Vue.swal("Error", "Unexpected Error!");
            }
        }
    }
};
