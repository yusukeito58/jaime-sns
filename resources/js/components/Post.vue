<template>
  <div style="width: 100%">
    <p>{{ item.content }}</p>
    <p>{{ item.created_at }}</p>
    <p>{{ item.owner.name }}</p>
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
