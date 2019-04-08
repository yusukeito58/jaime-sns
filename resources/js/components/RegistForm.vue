<template>
  <section class="container">
    <el-card>
      <div slot="header" class="clearfix">
        <span>User From</span>
      </div>
      <form class="form">
        <div v-if="registErrors">
          <ul v-if="registErrors.name">
            <li v-for="(msg, index) in registErrors.name" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="registErrors.email">
            <li v-for="(msg, index) in registErrors.email" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="registErrors.password">
            <li v-for="(msg, index) in registErrors.password" :key="index">{{ msg }}</li>
          </ul>
          <ul v-if="registErrors.password_confirmation">
            <li v-for="(msg, index) in registErrors.password_confirmation" :key="index">{{ msg }}</li>
          </ul>
        </div>

        <div class="form-content">
          <span>Name</span>
          <el-input v-model="registerForm.name"/>
        </div>
        <div class="form-content">
          <span>Email</span>
          <el-input v-model="registerForm.email"/>
        </div>
        <div class="form-content">
          <span>Photo</span>
          <input class type="file" @change="onFileChange">
          <output class v-if="preview">
            <img :src="preview" alt>
          </output>
        </div>
        <div class="form-content">
          <span>Password</span>
          <el-input v-model="registerForm.password"/>
        </div>
        <div class="form-content">
          <span>Password (confirm)</span>
          <el-input v-model="registerForm.password_confirmation"/>
        </div>
        <div class="text-right submit">
          <el-button type="primary" @click="register">Regist</el-button>
        </div>
      </form>
    </el-card>
  </section>
</template>

<script>
export default {
  props: {
    path: {
      type: String,
      required: true
    }
  },
  data() {
    return {
      registerForm: {
        name: "",
        email: "",
        photo: "",
        password: "",
        password_confirmation: ""
      },
      preview: null
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
      let url;
      if (this.path == "update") {
        url = "auth/update";
      } else {
        url = "auth/register";
      }

      await this.$store.dispatch(url, this.registerForm);

      if (this.apiStatus) {
        this.$router.push("/home");
      }
    },
    onFileChange(evnet) {
      // Not selected
      if (evnet.target.files.length === 0) {
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
      this.registerForm.photo = event.target.files[0];
    },
    reset() {
      this.preview = "";
      this.registerForm.photo = "";
      this.$el.querySelector('input[type="file"]').value = null;
    }
  }
};
</script>

<style lang="scss" scoped>
.submit {
  margin-top: 20px;
  > a {
    margin-right: 30px;
  }
}
.avatar-uploader .el-upload {
  border: 1px dashed #d9d9d9;
  border-radius: 6px;
  cursor: pointer;
  position: relative;
  overflow: hidden;
}
.avatar-uploader .el-upload:hover {
  border-color: #409eff;
}
.avatar-uploader-icon {
  font-size: 28px;
  color: #8c939d;
  width: 178px;
  height: 178px;
  line-height: 178px;
  text-align: center;
}
.avatar {
  width: 178px;
  height: 178px;
  display: block;
}
</style>