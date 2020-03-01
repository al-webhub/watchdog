// https://vuex.vuejs.org/en/actions.html
import Axios from 'axios'
export default {
  //
  GET_TODO: async (context, payload) => {
    let {data} = await Axios.get('/api/get/test');
    context.commit('SET_TODO', data);
  },

  SAVE_TODO: async (context, payload) => {
    let {data} = await Axios.post('/api/post/test');
    context.commit('ADD_TODO', payload);
  },
}
