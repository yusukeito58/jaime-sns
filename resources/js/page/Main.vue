<template>
  <el-row>
    <el-col :span="6">
      <Profile/>
    </el-col>
    <el-col :span="18">
      <PostList/>
    </el-col>
  </el-row>
</template>

<script>
import Profile from "../components/Profile.vue";
import PostList from "../components/PostList.vue";

export default {
  components: {
    Profile,
    PostList
  }
};
</script>
