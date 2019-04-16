<template>
  <div class="nav">
    <router-link class="nav__brand" to="/home">
      <img src="/images/logo.png" alt>
    </router-link>

    <span v-if="isLogin" @click="logout">Logout</span>
    <router-link v-else :to="'/login'">
      <ls-button :value="'Login / Regist'"/>
    </router-link>
    <router-link v-if="isLogin" to="/user/edit">Mypage</router-link>
    <span v-if="isLogin">Welcome {{ username }}</span>
  </div>
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

<style lang="scss" scoped>
.nav {
  align-items: center;
  background: #fff;
  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.2);
  display: flex;
  justify-content: space-between;
  position: relative;
  padding: 0.5rem 1rem;
}
</style>
