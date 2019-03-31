import Vue from 'vue';
import VueRouter from 'vue-router';

import Intro from './pages/Intro.vue';
import Home from './pages/Home.vue';
import Login from './pages/Login.vue';
import Regist from './pages/Regist.vue';

import System from './pages/errors/System.vue';

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
  },
  {
    path: '/500',
    component: System
  }
];

const router = new VueRouter({
  mode: 'history',
  routes
});

export default router;
