<template>
  <div class="text-center">
    <h1 class="mb-5">{{ this.page.header }}</h1>
    <div class="mb-5">{{ this.page.description }}</div>
  </div>
</template>

<script>
export default {
  name: "PageManager",
  props: ["page"],
};
</script>
