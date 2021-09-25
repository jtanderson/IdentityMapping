<template>
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-12">
        <button
          type="button"
          class="btn btn-success mb-4"
          data-toggle="modal"
          data-target="#exampleModal"
        >
          Add Page
        </button>
        <button
          type="button"
          class="btn btn-danger mb-4"
          v-on:click="deletePage"
        >
          Delete Page
        </button>
        <button type="button" class="btn btn-dark mb-4" v-on:click="editPage">
          Edit Page
        </button>
        <button type="button" class="btn btn-dark mb-4" v-on:click="orderPages">
          Order Pages
        </button>
        <div
          class="modal fade"
          id="exampleModal"
          tabindex="-1"
          role="dialog"
          aria-labelledby="exampleModalLabel"
          aria-hidden="true"
        >
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">New Page</h5>
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
                      <label class="mb-0">Page Header</label>
                    </div>
                    <textarea type="text" value="" class="mb-2 w-100" />
                    <div>
                      <label class="mb-0">Page Description</label>
                    </div>
                    <textarea type="text" value="" class="mb-2 w-100" />
                  </section>
                </form>
              </div>
              <div class="modal-footer">
                <button
                  type="button"
                  class="btn btn-primary"
                  v-onclick="addPage"
                >
                  Add
                </button>
              </div>
            </div>
          </div>
        </div>
        <h2>Pages</h2>
        <div class="card">
          <div class="card-body text-center"></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  mounted() {},

  data() {
    return {
      pages: {},
    };
  },

  name: "PageController",

  methods: {
    addPage() {},

    deletePage() {},

    editPage() {},

    orderPages() {},
  },
};
</script>


<!--
    We want the user to be able to dynamically add a page
    - This page will need Leichhardt questions (needs to be able to add and delete dynamically)
        - Same as participant questions
    - A preface page before these Leichhardt questions (content on this pages need to be completely dynamic as well)
        - Heading and description
 -->