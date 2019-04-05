<template>
  <section class="container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>User From</span>
      </div>
      <form class="form">
        <div v-if="registErrors">
          <ul v-if="registErrors.name">
            <li v-for="(msg, index) in registErrors.name" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="registErrors.email">
            <li v-for="(msg, index) in registErrors.email" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="registErrors.password">
            <li v-for="(msg, index) in registErrors.password" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="registErrors.password_confirmation">
            <li v-for="(msg, index) in registErrors.password_confirmation" :key="index">{{ msg }}</li>
          </ul>
        </div>

        <div class="form-content">
          <span>Name</span>
          <el-input v-model="registerForm.name"/>
        </div>
        <div class="form-content">
          <span>Email</span>
          <el-input v-model="registerForm.email"/>
        </div>
        <div class="form-content">
          <span>Password</span>
          <el-input v-model="registerForm.password"/>
        </div>
        <div class="form-content">
          <span>Password (confirm)</span>
          <el-input v-model="registerForm.password_confirmation"/>
        </div>
        <div class="text-right submit">
          <el-button type="primary" @click="register">Regist</el-button>
        </div>
      </form>
    </el-card>
  </section>
</template>

<script>
export default {
  props: {
    path: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      registerForm: {
        name: "",
        email: "",
        password: "",
        password_confirmation: ""
      }
    };
  },
  computed: {
    apiStatus() {
      return this.$store.state.auth.apiStatus;
    },
    registErrors() {
      return this.$store.state.auth.registErrorMessages;
    }
  },
  methods: {
    async register() {
      let url;
      if (this.path == "update") {
        url = "auth/update";
      } else {
        url = "auth/register";
      }

      await this.$store.dispatch(url, this.registerForm);

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