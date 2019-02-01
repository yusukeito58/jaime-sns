<template>
  <form class="form" @submit.prevent="register">
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
  methods: {
    register() {
      console.dir(this.registerForm);
    }
  }
};
</script>
