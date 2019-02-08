<template>
  <el-card>
    <img
      src="https://placehold.it/150x150"
      style="width: 100%;margin-bottom: 16px;border-radius:2px;"
      alt
    >
    <h2 style="text-align: center;">{{ username }}</h2>
  </el-card>
</template>

<script>
export default {
  computed: {
    username() {
      return this.$store.getters["auth/username"];
    }
  }
};
</script>
