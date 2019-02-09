<template>
  <el-card v-show="value">
    <h2>Submit a post</h2>
    <form>
      <input v-model="content">
      <el-button type="primary" @click="submit" round>Primary</el-button>
    </form>
  </el-card>
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
    }
  }
};
</script>
