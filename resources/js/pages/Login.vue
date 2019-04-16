<template>
  <section>
    <div>
      <div>
        <span>Login Form</span>
      </div>
      <form>
        <div v-if="loginErrors">
          <ul v-if="loginErrors.email">
            <li v-for="(msg, index) in loginErrors.email" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="loginErrors.password">
            <li v-for="(msg, index) in loginErrors.password" :key="index">{{ msg }}</li>
          </ul>
        </div>
        <div>
          <span>Email</span>
          <input type="text" v-model="loginForm.email">
        </div>
        <div>
          <span>Password</span>
          <input type="password" v-model="loginForm.password">
        </div>
        <div>
          <router-link to="/regist">Signup</router-link>
          <div type="primary" @click="login">Login</div>
        </div>
      </form>
    </div>
  </section>
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
.submit {
  margin-top: 20px;
  > a {
    margin-right: 30px;
  }
}
</style>
