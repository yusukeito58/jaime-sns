<template>
  <div class="c-panel">
    <div class="c-plofile">
      <img class="c-photo" :src="photourl" alt>
      <div class="c-name">{{ username }}</div>
    </div>
  </div>
</template>

<script>
export default {
  computed: {
    username() {
      return this.$store.getters["auth/username"];
    },
    photourl() {
      return this.$store.getters["auth/userphoto"];
    }
  }
};
</script>

<style lang="scss" scoped>
.c-photo {
  width: 100%;
  margin-bottom: 20px;
}

.c-name {
  text-align: center;
}
</style>
