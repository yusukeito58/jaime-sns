<template>
  <div class="c-panel">
    <div v-if="posts">
      <Post v-for="post in posts" :item="post" :key="post.id"/>
      <infinite-loading @infinite="onInfinite" ref="infiniteLoading">
        <span slot="no-more">no more contents dorobow.</span>
      </infinite-loading>
    </div>
    <div v-else>There are no posts yet.</div>
  </div>
</template>

<script>
import InfiniteLoading from "vue-infinite-loading";
import Post from "./Post.vue";

export default {
  components: {
    InfiniteLoading,
    Post
  },
  data() {
    return {
      posts: [],
      page: 0
    };
  },
  created() {},
  methods: {
    async onInfinite() {
      this.page++;

      const response = await axios
        .get(`/api/posts?page=${this.page}`)
        .then(res => {
          if (0 < res.data.data.length) {
            this.posts.push(...res.data.data);
            this.$refs.infiniteLoading.stateChanger.loaded();
          } else {
            this.$refs.infiniteLoading.stateChanger.complete();
          }
        })
        .catch(err => {
          this.$refs.infiniteLoading.$emit("$InfiniteLoading:complete");
        });
    }
  }
};
</script>
