<template>
  <el-card>
    <img :src="photourl" style="width: 100%;margin-bottom: 16px;border-radius:2px;" alt>
    <h2 style="text-align: center;">{{ username }}</h2>
  </el-card>
</template>

<script>
export default {
  computed: {
    username() {
      return this.$store.getters["auth/username"];
    },
    photourl() {
      return this.$store.getters["auth/userphoto"];
    }
  }
};
</script>
