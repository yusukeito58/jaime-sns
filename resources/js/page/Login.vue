<template>
  <section class="container">
    <el-card style="flex: 1">
      <div slot="header" class="clearfix">
        <span>Login Form</span>
      </div>
      <form>
        <div class="form-content">
          <span>Email</span>
          <el-input v-model="loginForm.email"/>
        </div>
        <div class="form-content">
          <span>Password</span>
          <el-input type="password" v-model="loginForm.password"/>
        </div>
        <div class="text-right">
          <el-button type="primary" @click="login">Login</el-button>
        </div>
      </form>
    </el-card>
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
  methods: {
    async login() {
      await this.$store.dispatch("auth/login", this.loginForm);

      this.$router.push("/");
    }
  }
};
</script>
