// https://vuex.vuejs.org/en/mutations.html

export default {
  //
  SET_TODO: (state, payload) => {
    state.todos = payload;
  },

  ADD_TODO: (state, payload) => {
    state.todos.push(payload);
  },
}
