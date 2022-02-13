<template>
  <div class="card m-4">
    <div class="card-body">
      <h4>Page #{{ order }}</h4>
      <h4>Header</h4>
      {{ header }}
      <h4 class="mt-2">Description</h4>
      {{ description }}
      <hr />
      <button type="button" class="btn btn-primary" v-on:click="viewPage">
        View
      </button>
      <button type="button" class="btn btn-danger" v-on:click="deletePage">
        Delete
      </button>
      <button type="button" class="btn btn-warning" v-on:click="editPage">
        Edit
      </button>
    </div>
  </div>
</template>

<script>
export default {
  name: "PageMapper",

  data() {
    return {};
  },

  methods: {
    deletePage() {
      this.delete(this.order);
    },

    editPage() {
      window.location.href = `editsurveypage/${this.order}`;
    },
    viewPage() {
      this.view(this.order);
    },
  },
  props: ["view", "delete", "edit", "header", "description", "order"],
};
</script>
