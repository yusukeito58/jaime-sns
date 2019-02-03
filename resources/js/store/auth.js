const state = {
  user: null
};

const getters = {};

const mutations = {
  setUser(state, user) {
    state.user = user;
  }
};

const actions = {
  async register(context, data) {
    const response = await axios.post('/api/register', data);
    console.dir(response);
    context.commit('setUser', response.data);
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
