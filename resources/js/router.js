import Vue from 'vue';
import VueRouter from 'vue-router';

import Main from './page/Main.vue';
import Login from './page/Login.vue';
import Regist from './page/Regist.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Main,
    meta: {
      requiresAuth: true
    }
  },
  {
    path: '/login',
    component: Login
  },
  {
    path: '/regist',
    component: Regist
  }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router;
