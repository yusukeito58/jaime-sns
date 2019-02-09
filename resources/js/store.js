import Vue from 'vue';
import Vuex from 'vuex';

import auth from './store/auth';
import message from './store/message';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    auth,
    message
  }
});

export default store;
