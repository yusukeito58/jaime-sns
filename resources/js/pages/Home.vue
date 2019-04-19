<template>
  <div class="container">
    <div>
      <div>
        <Profile/>
      </div>
      <div>
        <button v-if="!showForm" @click="showForm = !showForm">Submit a post</button>
        <PostForm v-model="showForm"/>
        <PostList/>
      </div>
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
