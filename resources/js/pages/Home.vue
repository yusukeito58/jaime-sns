<template>
  <div class="container">
    <div class="grid">
      <div class="grid__item grid__item--3 has-gutter">
        <Profile/>
      </div>
      <div class="grid__item grid__item--9 has-gutter">
        <ls-button v-if="!showForm" :value="'Submit a post'" @click.native="showForm = !showForm"/>
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
