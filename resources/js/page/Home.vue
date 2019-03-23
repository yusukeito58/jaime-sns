<template>
  <div>
    <el-row v-if="isLogin">
      <el-col :span="6">
        <Profile/>
      </el-col>
      <el-col :span="18">
        <el-button v-if="!showForm" @click="showForm = !showForm">Submit a post</el-button>
        <PostForm v-model="showForm"/>
        <PostList/>
      </el-col>
    </el-row>
    <el-row v-else>
      <h1>Top Page</h1>
      <router-link :to="{ path: '/login'}">
        <el-button type="primary" plain>Login</el-button>
      </router-link>
      <router-link :to="{ path: '/regist' }">
        <el-button>Regist</el-button>
      </router-link>
    </el-row>
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
