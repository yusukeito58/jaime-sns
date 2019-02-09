<template>
  <el-row>
    <el-col :span="6">
      <Profile/>
    </el-col>
    <el-col :span="18">
      <button v-if="!showForm" @click="showForm = !showForm">Submit a post</button>
      <PostForm v-model="showForm"/>
      <PostList/>
    </el-col>
  </el-row>
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
  }
};
</script>
