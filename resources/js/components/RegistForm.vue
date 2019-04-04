<template>
  <form class="form" @submit.prevent="register">
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

    <label for="username">Name</label>
    <input type="text" id="username" class="form__item" v-model="registerForm.name">
    <label for="email">Email</label>
    <input type="text" id="email" v-model="registerForm.email">
    <label for="password">Password</label>
    <input type="password" id="password" v-model="registerForm.password">
    <label for="password-confirmation">Password (confirm)</label>
    <input type="password" id="password-comfirmation" v-model="registerForm.password_confirmation">
    <div>
      <button type="submit">register</button>
    </div>
  </form>
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
      await this.$store.dispatch("auth/register", this.registerForm);

      if (this.apiStatus) {
        this.$router.push("/home");
      }
    }
  }
};
</script>