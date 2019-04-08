import Vue from 'vue';
import VueRouter from 'vue-router';

import Intro from './pages/Intro.vue';
import Home from './pages/Home.vue';
import Login from './pages/Login.vue';
import Regist from './pages/Regist.vue';

import UserEdit from './pages/user/Edit.vue';

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
    component: Login,
    meta: {
      requiresNotAuth: true
    }
  },
  {
    path: '/regist',
    component: Regist,
    meta: {
      requiresNotAuth: true
    }
  },
  {
    path: '/user/edit',
    component: UserEdit,
    meta: {
      requiresAuth: true
    }
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
