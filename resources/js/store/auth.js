import { longStackSupport } from 'q';
import { OK, UNPROCESSABLE_ENTITY } from '../util';

const state = {
  user: null,
  apiStatus: null,
  loginErrorMessages: null,
  registErrorMessages: null
};

const getters = {
  check: state => !!state.user,
  username: state => (state.user ? state.user.name : '')
};

const mutations = {
  setUser(state, user) {
    state.user = user;
  },
  setApiStatus(state, apiStatus) {
    state.apiStatus = apiStatus;
  },
  setLoginErrorMessages(state, messages) {
    state.loginErrorMessages = messages;
  },
  setRegistErrorMessages(state, messages) {
    state.registErrorMessages = messages;
  }
};

const actions = {
  async register(context, data) {
    context.commit('setApiStatus', null);
    const response = await axios
      .post('/api/register', data)
      .catch(err => err.response || err);

    if (response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', response.data);
      return false;
    }

    context.commit('setApiStatus', false);
    if (response.status === UNPROCESSABLE_ENTITY) {
      context.commit('setRegistErrorMessages', response.data.errors);
    } else {
      context.commit('error/setCode', response.status, { root: true });
    }
  },
  async login(context, data) {
    context.commit('setApiStatus', null);
    const response = await axios
      .post('/api/login', data)
      .catch(err => err.response || err);

    if (response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', response.data);
      return false;
    }

    context.commit('setApiStatus', false);
    if (response.status === UNPROCESSABLE_ENTITY) {
      context.commit('setLoginErrorMessages', response.data.errors);
    } else {
      context.commit('error/setCode', response.status, { root: true });
    }
  },
  async logout(context) {
    context.commit('setApiStatus', null);
    const response = await axios.post('/api/logout');

    if (response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', null);
      return false;
    }

    context.commit('setApiStatus', false);
    context.commit('error/setCode', response.status, { root: true });
  },
  async currentUser(context) {
    context.commit('setApiStatus', null);
    const response = await axios.get('/api/user');
    const user = response.data || null;

    if (response.status === OK) {
      context.commit('setApiStatus', true);
      context.commit('setUser', user);
    }

    context.commit('setApiStatus', false);
    context.commit('error/setCode', response.status, { root: true });
  }
};

export default {
  namespaced: true,
  state,
  getters,
  mutations,
  actions
};
