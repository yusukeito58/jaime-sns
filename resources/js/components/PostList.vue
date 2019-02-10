<template>
  <div>
    <Post v-for="post in posts" :item="post" :key="post.id"/>
  </div>
</template>

<script>
import Post from "./Post.vue";

export default {
  components: {
    Post
  },
  data() {
    return {
      posts: []
    };
  },
  created() {
    // initial
    this.fetchPosts();

    this.update();
  },
  methods: {
    update() {
      setInterval(this.fetchPosts, 10000);
    },
    async fetchPosts() {
      const response = await axios.get("/api/posts");

      this.posts = response.data.data;
    }
  }
};
</script>
