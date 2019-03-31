import Vue from 'vue';
import Vuex from 'vuex';

import auth from './store/auth';
import message from './store/message';
import error from './store/error';

Vue.use(Vuex);

const store = new Vuex.Store({
  modules: {
    auth,
    message,
    error
  }
});

export default store;
