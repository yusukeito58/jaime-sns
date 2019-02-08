<template>
  <el-menu mode="horizontal">
    <el-menu-item index="1" style="pointer-events:none;">Laravel-SNS</el-menu-item>

    <el-menu-item v-if="isLogin" index="4" style="float: right;" @click="logout">Logout</el-menu-item>
    <el-menu-item
      v-else
      index="4"
      style="float: right;"
      :router="{ path: '/login'}"
    >Login / Register</el-menu-item>
    <el-menu-item v-if="isLogin" index="5" style="float: right;">Post a coeur</el-menu-item>
    <el-menu-item v-if="isLogin" index="6" style="float: right; pointer-events:none;">
      <span>{{ username }}</span>
    </el-menu-item>
  </el-menu>
</template>

<script>
export default {
  computed: {
    isLogin() {
      return this.$store.getters["auth/check"];
    },
    username() {
      return this.$store.getters["auth/username"];
    }
  },
  methods: {
    async logout() {
      await this.$store.dispatch("auth/logout");

      this.$router.push("/logout");
    }
  }
};
</script>
