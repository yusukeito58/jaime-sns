<template>
  <form class="form">
    <label for="login-email">Email</label>
    <input type="text" id="login-email" class="form__item" v-model="loginForm.email">
    <label for="login-password">Password</label>
    <input type="password" id="login-password" class="form__item" v-model="loginForm.password">
    <div class="form__button">
      <button type="submit" class="button button-inverse">login</button>
    </div>
  </form>
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
  }
};
</script>
