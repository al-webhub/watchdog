import Vue from "vue";
import Vuex from "vuex";
import axios from "axios";

Vue.use(Vuex);
import moment from "moment";

export default {
  namespaced: true,
  state: {
    fullscans: null,
    analytics: null
  },
  getters: {
    getFullscan(state) {
      return state.fullscans;
    },
    getAnalytics(state) {
      return state.analytics;
    }
  },
  mutations: {
    async SET_FULLSCANS(state, fullscans) {
      state.fullscans = fullscans;
    },
    async SET_ANALYTICS(state, analytics) {
      state.analytics = analytics;
    }
  },
  actions: {
    async startScan({ commit }, data) {
      let response = await axios.post("/api/fss/start", data);
      await commit("SET_FULLSCANS", response.data);
    },
    async requestFullscan({ commit }, params) {
      let response = await axios.get("/api/fss/get", {
        params: {
          page: params.page,
          website_id: params.website_id,
          search: params.search,
          filter: params.filter,
          params: params.params
        }
      });
      if (!typeof response.data.all.data == undefined) {
        response.data.all.data.map(async item => {
          item.score_mobile_class = scoreColor(item.score_mobile);
          item.score_desktop_class = scoreColor(item.score_desktop);
          item.fcp_mobile_class = ColorizeFCP(item.fcp_mobile);
          item.fcp_desktop_class = ColorizeFCP(item.fcp_desktop);
          item.si_mobile_class = ColorizeSI(item.si_mobile);
          item.si_desktop_class = ColorizeSI(item.si_desktop);
          item.tbt_mobile_class = ColorizeTBT(item.tbt_mobile);
          item.tbt_desktop_class = ColorizeTBT(item.tbt_desktop);
          item.tti_mobile_class = ColorizeTTI(item.tti_mobile);
          item.tti_desktop_class = ColorizeTTI(item.tti_desktop);
          item.cls_mobile_class = ColorizeCLS(item.cls_mobile);
          item.cls_desktop_class = ColorizeCLS(item.cls_desktop);
          return item;
        });
      }

      await commit("SET_FULLSCANS", response.data);
    },
    async deleteScanByid({ dispatch }, website_id) {
      let response = await axios.post("/api/fss/delete", {
        website_id: website_id
      });
      let params = {
        page: 1,
        website_id: website_id,
        search: ""
      };
      dispatch("requestFullscan", params);
    },
    async rescanUrl({ dispatch }, data) {
      await axios.post("/api/fss/rescanurl", data);
    },
    async requestAnalytics({ commit }, website_id) {
      let response = await axios.get("/api/fss/getanalytics", {
        params: {
          website_id: website_id
        }
      });
      await commit("SET_ANALYTICS", response.data);
    }
  }
};

axios.interceptors.response.use(
  function(response) {
    return response;
  },
  function(error) {
    if (error.response.status === 404) {
      Vue.swal("Error", "Website not found, or wrong permissions", "error");
    }
    return Promise.reject(error);
  }
);

function scoreColor(value) {
  let color = "default";
  if (value > 0 && value <= 49) {
    color = "red";
  }
  if (value >= 50 && value <= 89) {
    color = "orange";
  }
  if (value >= 90 && value <= 100) {
    color = "green";
  }
  return color;
}

/**
 * @return {string}
 */
function ColorizeFCP(value) {
  let color = "default";
  if (value > 1 && value <= 1999) {
    color = "green";
  }
  if (value >= 2000 && value <= 3999) {
    color = "orange";
  }
  if (value >= 4000) {
    color = "red";
  }
  return color;
}

/**
 * @return {string}
 */
function ColorizeSI(value) {
  let color = "default";
  if (value > 1 && value <= 3899) {
    color = "green";
  }
  if (value >= 3900 && value <= 7299) {
    color = "orange";
  }
  if (value >= 7300) {
    color = "red";
  }
  return color;
}

/**
 * @return {string}
 */
function ColorizeTBT(value) {
  let color = "default";
  if (value > 1 && value <= 300) {
    color = "green";
  }
  if (value >= 301 && value <= 599) {
    color = "orange";
  }
  if (value >= 600) {
    color = "red";
  }
  return color;
}

/**
 * @return {string}
 */
function ColorizeTTI(value) {
  let color = "default";
  if (value > 1 && value <= 3899) {
    color = "green";
  }
  if (value >= 3900 && value <= 7299) {
    color = "orange";
  }
  if (value >= 7300) {
    color = "red";
  }
  return color;
}

/**
 * @return {string}
 */
function ColorizeCLS(value) {
  let color = "default";
  if (value > 0.001 && value <= 0.1) {
    color = "green";
  }
  if (value >= 0.101 && value <= 0.25) {
    color = "orange";
  }
  if (value >= 0.251) {
    color = "red";
  }
  return color;
}
