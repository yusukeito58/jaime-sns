<template>
  <div class="wrapper">
    <div class="intro">
      <h1 class="title">Laravel-SNS</h1>
      <p class="description">
        It is a web application that imitates Twitter.
        <br>Created by Laravel + Vue.js.
      </p>
      <div type="primary" round class="login" @click="login">Login</div>
    </div>
  </div>
</template>

<script>
export default {
  methods: {
    login() {
      location.href = "/login";
    }
  }
};
</script>

<style lang="scss" scoped>
.wrapper {
  background: #fafafa;
  width: 100%;
  min-height: calc(100vh - 61px);

  background-image: url(/images/background.jpg);
  background-position: center center;
  background-repeat: no-repeat;
  background-size: cover;
  background-color: #464646;
  display: flex;
  justify-content: center;
  align-items: center;
  position: relative;
}

.intro {
  top: -5em;
  left: 0;
  right: 0;
  bottom: 0;
  height: 200px;
  text-align: center;
  margin: auto;
  position: absolute;
  color: #f0f0f0;
  > .title {
    font-size: 8vw; // TODO
  }
  > .description {
    font-size: 2.5vw; // TODO
  }
  > .login {
    margin-top: 50px;
    font-size: 2vw; // TODO
  }
}
</style>
