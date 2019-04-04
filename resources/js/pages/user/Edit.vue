<template>
  <div>
    <p>mypage edit</p>
    <RegistForm :path="path"/>
  </div>
</template>

<script>
import RegistForm from "../../components/RegistForm.vue";

export default {
  components: {
    RegistForm
  },
  data() {
    return {
      path: "update"
    };
  }
};
</script>
