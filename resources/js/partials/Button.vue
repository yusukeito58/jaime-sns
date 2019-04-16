<template>
  <router-link class="button" :to="to">{{ value }}</router-link>
</template>

<script>
export default {
  props: {
    to: {
      type: String,
      required: false
    },
    value: {
      type: String,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
.button {
  border: 1px solid #dedede;
  border-radius: 1.5rem;
  color: #8a8a8a;
  padding: 0.6rem 1rem;
  text-decoration: none;
  transition: all 0.4s;

  &:hover {
    background-color: #000;
    opacity: 0.8;
    color: #fff;
    transition: all 0.4s;
  }
}
</style>
