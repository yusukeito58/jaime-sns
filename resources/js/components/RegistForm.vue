<template>
  <div class="container--small">
    <div class="c-panel">
      <div class="c-header">User Form</div>
      <form class="c-form">
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

        <label>Name</label>
        <input type="input" class="c-form__item" v-model="registerForm.name">
        <label>Email</label>
        <input type="input" class="c-form__item" v-model="registerForm.email">
        <label>Photo</label>
        <input type="file" class="c-image" @change="onFileChange">
        <output v-if="preview" class="c-preview">
          <img :src="preview" alt>
        </output>
        <label>Password</label>
        <input type="password" class="c-form__item" v-model="registerForm.password">
        <label>Password (confirm)</label>
        <input type="password" class="c-form__item" v-model="registerForm.password_confirmation">
        <div class="u-right">
          <ls-button :value="'Regist'" @click="register"/>
        </div>
      </form>
    </div>
  </div>
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
        photo: "",
        password: "",
        password_confirmation: ""
      },
      preview: null
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
    },
    onFileChange(evnet) {
      // Not selected
      if (evnet.target.files.length === 0) {
        this.reset();
        return false;
      }

      // Not image files
      if (!event.target.files[0].type.match("image.*")) {
        this.reset();
        return false;
      }

      const reader = new FileReader();

      reader.onload = e => {
        this.preview = e.target.result;
      };

      reader.readAsDataURL(event.target.files[0]);

      // set form
      this.registerForm.photo = event.target.files[0];
    },
    reset() {
      this.preview = "";
      this.registerForm.photo = "";
      this.$el.querySelector('input[type="file"]').value = null;
    }
  }
};
</script>

<style lang="scss" scoped>
.c-image {
  margin-bottom: 1rem;
}
.c-preview {
  > img {
    display: block;
    padding-bottom: 1rem;
    width: 70%;
    margin: 0 auto;
  }
}
.u-right {
  text-align: right;
}
</style>