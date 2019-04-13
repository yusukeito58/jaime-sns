<template>
  <div v-if="message" :title="message" :type="type" center show-icon></div>
</template>

<script>
import { mapState } from "vuex";
export default {
  computed: {
    ...mapState({
      message: state => state.message.content,
      type: state => state.message.type
    })
  }
};
</script>
