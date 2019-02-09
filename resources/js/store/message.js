const state = {
  content: '',
  type: ''
};

const mutations = {
  setContent(state, { content, type, timeout }) {
    state.content = content;
    state.type = type;

    if (typeof timeout === 'undefined') {
      timeout = 3000;
    }

    setTimeout(() => (state.content = ''), timeout);
  }
};

export default {
  namespaced: true,
  state,
  mutations
};
