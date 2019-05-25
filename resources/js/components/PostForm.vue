<template>
  <div v-show="value" class="c-panel">
    <form class="c-form">
      <textarea
        class="c-form__item c-form__item__textarea"
        placeholder="Please input"
        row="4"
        v-model="postForm.content"
      ></textarea>
      <input class="c-image" type="file" @change="onFileChange">
      <output v-if="preview" class="c-preview">
        <img :src="preview" alt>
      </output>
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
      postForm: {
        content: "",
        photo: ""
      },
      preview: null
    };
  },
  methods: {
    async submit() {
      const formData = new FormData();

      formData.append("content", this.postForm.content);
      formData.append("photo", this.postForm.photo);

      const response = await axios.post("/api/posts", formData);

      this.postForm.content = "";
      this.reset();

      this.$emit("input", false);

      this.$store.commit("message/setContent", {
        content: "Successful message posting！",
        type: "success",
        timeout: 6000
      });
    },
    onFileChange(event) {
      // Not selected
      if (event.target.files.length === 0) {
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
      this.postForm.photo = event.target.files[0];
    },
    reset() {
      this.preview = "";
      this.postForm.photo = "";
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
