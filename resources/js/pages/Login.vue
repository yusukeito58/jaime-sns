<template>
  <div class="container--small">
    <div class="c-panel">
      <div class="c-header">Login Form</div>
      <form class="c-form">
        <div v-if="loginErrors">
          <ul v-if="loginErrors.email">
            <li v-for="(msg, index) in loginErrors.email" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="loginErrors.password">
            <li v-for="(msg, index) in loginErrors.password" :key="index">{{ msg }}</li>
          </ul>
        </div>
        <label>Email</label>
        <input type="text" class="c-form__item" v-model="loginForm.email">
        <label>Password</label>
        <input type="password" class="c-form__item" v-model="loginForm.password">
        <div class="u-right u-boxes">
          <router-link to="/regist">
            <ls-button :value="'Signup'"/>
          </router-link>
          <ls-button :value="'Login'" @click="login"/>
        </div>
      </form>
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {
      loginForm: {
        email: "",
        password: ""
      }
    };
  },
  computed: {
    apiStatus() {
      return this.$store.state.auth.apiStatus;
    },
    loginErrors() {
      return this.$store.state.auth.loginErrorMessages;
    }
  },
  methods: {
    async login() {
      await this.$store.dispatch("auth/login", this.loginForm);

      if (this.apiStatus) {
        this.$router.push("/home");
      }
    }
  }
};
</script>

<style lang="scss" scoped>
.u-boxes {
  margin: 1rem 0 0.5rem 0;
  > :last-child {
    margin-left: 0.5rem;
  }
}
.u-right {
  text-align: right;
}
</style>
