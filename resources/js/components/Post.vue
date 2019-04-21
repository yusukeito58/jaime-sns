<template>
  <div class="c-card">
    <div class="c-header">
      <span>{{ item.owner.name }}</span>
      <span>{{ item.created_at | moment}}</span>
    </div>
    <div>{{ item.content }}</div>
  </div>
</template>

<script>
export default {
  props: {
    item: {
      type: Object,
      required: true
    }
  }
};
</script>

<style lang="scss" scoped>
</style>
