import './bootstrap';

import Vue from 'vue';

import router from './router';
import store from './store';
import App from './App.vue';

const createApp = async () => {
  await store.dispatch('auth/currentUser');

  router.beforeEach((to, from, next) => {
    if (
      to.matched.some(record => record.meta.requiresAuth) &&
      !store.getters['auth/check']
    ) {
      next('login');
    } else {
      next();
    }
  });

  new Vue({
    el: '#app',
    router,
    store,
    components: { App },
    template: '<App />'
  });
};

createApp();
