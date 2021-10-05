<template>
  <div class="card m-4">
    <div class="card-body">
      <h4>Page #{{ order }}</h4>
      <h4>Header</h4>
      {{ header }}
      <h4 class="mt-2">Description</h4>
      {{ description }}
    </div>
  </div>
</template>

<script>
export default {
  name: "PageMapper",

  data() {
    return {};
  },
  setup() {},
  props: ["header", "description", "order"],
};
</script>
