<template>
  <div v-show="value" class="c-panel">
    <form class="c-form">
      <textarea
        class="c-form__item c-form__item__textarea"
        placeholder="Please input"
        row="4"
        v-model="content"
      ></textarea>
      <div class="u-right">
        <ls-button :value="'Post'" @click.native="submit"/>
      </div>
    </form>
  </div>
</template>

<script>
export default {
  props: {
    value: {
      type: Boolean,
      required: true
    }
  },
  data() {
    return {
      content: ""
    };
  },
  methods: {
    async submit() {
      const formData = new FormData();
      formData.append("content", this.content);

      const response = await axios.post("/api/posts", formData);

      this.content = "";
      this.$emit("input", false);

      this.$store.commit("message/setContent", {
        content: "Successful message posting！",
        type: "success",
        timeout: 6000
      });
    }
  }
};
</script>

<style lang="scss" scoped>
.u-right {
  text-align: right;
}
</style>
