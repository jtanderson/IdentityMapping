<template>
  <div
    class="modal fade"
    id="deleteModal"
    tabindex="-1"
    role="dialog"
    aria-labelledby="deleteModalLabel"
    aria-hidden="true"
  >
    <div class="modal-dialog" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="deleteModalLabel">Delete Page</h5>
          <button
            type="button"
            class="close"
            data-dismiss="modal"
            aria-label="Close"
          >
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <form name="page-data">
            <section class="block">
              <div>
                <label class="mb-0">Page Number</label>
              </div>
              <input
                type="number"
                value=""
                class="mb-2 w-25"
                @input="updateDeletePageNumber($event.target.value)"
              />
            </section>
          </form>
        </div>
        <div class="modal-footer">
          <button
            type="button"
            class="btn btn-primary"
            data-dismiss="modal"
            v-on:click="deletePage"
          >
            Delete
          </button>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "Modal",
  setup() {},
};
</script>
