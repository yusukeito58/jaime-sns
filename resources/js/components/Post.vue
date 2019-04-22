<template>
  <div class="c-card">
    <div class="c-header">
      <span class="c-name">{{ item.owner.name }}</span>
      <span class="c-date">{{ item.created_at | moment}}</span>
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
.c-header {
  font-size: 0.8rem;
  margin-bottom: 1.5rem;

  > .c-name {
    font-weight: 600;
    margin-right: 20px;
  }

  > .c-date {
  }
}
</style>
