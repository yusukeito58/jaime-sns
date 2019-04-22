<template>
  <span class="button" :class="classObject">{{ value }}</span>
</template>

<script>
export default {
  props: {
    value: {
      type: String,
      required: true
    },
    type: {
      type: String,
      required: false
    }
  },
  computed: {
    classObject() {
      return this.type ? "button--" + this.type : "";
    }
  }
};
</script>

<style lang="scss" scoped>
.button {
  border: 1px solid #dedede;
  border-radius: 1.5rem;
  color: #8a8a8a;
  background-color: #fff;
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

.button--primary {
  background-color: #83a7f1;
  color: #fff;
  &:hover {
    background-color: #3575f5;
    color: #fff;
  }
}
</style>
