<template></template>

<script>
export default {
  computed: {
    isLogin() {
      return this.$store.getters["auth/check"];
    }
  },
  methods: {}
};
</script>
