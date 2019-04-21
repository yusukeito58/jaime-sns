<template>
  <div class="c-nav">
    <router-link class="nav__brand" to="/home">
      <img src="/images/logo.png" alt>
    </router-link>

    <div class="c-menu">
      <div v-if="isLogin">
        <span @click="logout">
          <ls-button :value="'Logout'"/>
        </span>
        <span>
          <router-link to="/user/edit">
            <ls-button :value="'Mypage'"/>
          </router-link>
        </span>
        <span>Welcome {{ username }}</span>
      </div>
      <div v-else>
        <span>
          <router-link :to="'/login'">
            <ls-button :value="'Login / Regist'"/>
          </router-link>
        </span>
      </div>
    </div>
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
.c-nav {
  align-items: center;
  background: #fff;
  box-shadow: 0 3px 8px 0 rgba(0, 0, 0, 0.2);
  display: flex;
  justify-content: space-between;
  position: relative;
  padding: 0.5rem 1rem;

  > .c-menu {
    > div > span {
      margin: 0 0.5rem;

      &:last-child {
        margin-left: 1rem;
      }
    }
  }
}
</style>
