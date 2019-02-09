<template>
  <el-card v-show="value">
    <form>
      <el-input type="textarea" :rows="3" placeholder="Please input" v-model="content"></el-input>
      <el-button type="primary" @click="submit" round style="float: right;">Primary</el-button>
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
      this.$emit("input", false);
    }
  }
};
</script>
