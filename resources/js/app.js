import './bootstrap';

import Vue from 'vue';
import moment from 'moment';
import router from './router';
import store from './store';
import App from './App.vue';

import lsButton from './partials/Button.vue';
Vue.component('ls-button', lsButton);

Vue.filter('moment', function(value) {
  return moment(value).format('YYYY/MM/DD HH:mm');
});

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
