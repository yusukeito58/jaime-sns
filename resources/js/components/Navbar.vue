<template>
  <el-menu mode="horizontal" router>
    <el-menu-item index="1" style="pointer-events:none;">Laravel-SNS</el-menu-item>

    <el-menu-item v-if="isLogin" index="4" style="float: right;" @click="logout">Logout</el-menu-item>
    <el-menu-item v-else index="4" style="float: right;" :route="{ path: '/login'}">Login / Register</el-menu-item>
    <el-menu-item
      v-if="isLogin"
      index="5"
      style="float: right;"
      :route="{ path: '/user/edit'}"
    >Mypage</el-menu-item>
    <el-menu-item
      v-if="isLogin"
      index="6"
      style="float: right; pointer-events:none;"
    >Welcome {{ username }}</el-menu-item>
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

      this.$router.push("/login");
    }
  }
};
</script>
