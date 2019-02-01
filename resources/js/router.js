import Vue from 'vue';
import VueRouter from 'vue-router';

import Login from './page/Login.vue';
import Regist from './page/Regist.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Login
  },
  {
    path: '/regist',
    component: Regist
  }
];

const router = new VueRouter({
  routes
});

export default router;
