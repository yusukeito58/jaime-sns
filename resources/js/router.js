import Vue from 'vue';
import VueRouter from 'vue-router';

import Intro from './page/Intro.vue';
import Home from './page/Home.vue';
import Login from './page/Login.vue';
import Regist from './page/Regist.vue';

Vue.use(VueRouter);

const routes = [
  {
    path: '/',
    component: Intro
  },
  {
    path: '/home',
    component: Home,
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
