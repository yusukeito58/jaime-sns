<template>
  <div v-show="value">
    <form>
      <input type="textarea" :rows="3" placeholder="Please input" v-model="content">
      <button type="primary" @click="submit" round style="float: right;">Primary</button>
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
