import './bootstrap';

import Vue from 'vue';
import ElementUI from 'element-ui';
import 'element-ui/lib/theme-chalk/index.css';

Vue.use(ElementUI);

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
    } else if (
      to.matched.some(record => record.meta.requiresNotAuth) &&
      store.getters['auth/check']
    ) {
      next('home');
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
