<template>
  <RegistForm path="regist"/>
</template>

<script>
import RegistForm from "../components/RegistForm.vue";

export default {
  components: {
    RegistForm
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
