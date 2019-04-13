<template>
  <div>
    <div v-if="isLogin">
      <div :span="6">
        <Profile/>
      </div>
      <div :span="18">
        <button v-if="!showForm" @click="showForm = !showForm">Submit a post</button>
        <PostForm v-model="showForm"/>
        <PostList/>
      </div>
    </div>
    <div v-else>
      <h1>Top Page</h1>
      <router-link :to="{ path: '/login'}">
        <button type="primary" plain>Login</button>
      </router-link>
      <router-link :to="{ path: '/regist' }">
        <button>Regist</button>
      </router-link>
    </div>
  </div>
</template>

<script>
import Profile from "../components/Profile.vue";
import PostForm from "../components/PostForm.vue";
import PostList from "../components/PostList.vue";

export default {
  components: {
    Profile,
    PostForm,
    PostList
  },
  data() {
    return {
      showForm: false
    };
  },
  computed: {
    isLogin() {
      return this.$store.getters["auth/check"];
    }
  }
};
</script>
