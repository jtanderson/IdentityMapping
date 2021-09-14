<template>
  <tr>
    <td>
      <textarea type="text" v-bind:id="category.id+'-name'" v-model="category.name" style="width: 100%;"></textarea>
    </td>
    <td>
      <div class="btn-group" role="group">
        <button class="btn btn-primary" @click="$emit('save', category)">Save</button>
      </div>
    </td>
  </tr>
</template>

<script>
  export default {
    props: ['category']
  }
</script>
