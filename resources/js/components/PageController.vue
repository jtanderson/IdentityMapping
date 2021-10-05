<template>
  <div>
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-md-12">
          <div class="text-center">
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
              data-toggle="modal"
              data-target="#deleteModal"
            >
              Delete Page
            </button>
            <button
              type="button"
              class="btn btn-dark mb-4"
              v-on:click="editPage"
            >
              Edit Page
            </button>
            <button
              type="button"
              class="btn btn-dark mb-4"
              v-on:click="orderPages"
            >
              Order Pages
            </button>
          </div>
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
                      <textarea
                        type="text"
                        value=""
                        class="mb-2 w-100"
                        @input="updateHeader($event.target.value)"
                      />
                      <div>
                        <label class="mb-0">Page Description</label>
                      </div>
                      <textarea
                        type="text"
                        value=""
                        class="mb-2 w-100"
                        @input="updateDescription($event.target.value)"
                      />
                    </section>
                  </form>
                </div>
                <div class="modal-footer">
                  <button
                    type="button"
                    class="btn btn-primary"
                    data-dismiss="modal"
                    v-on:click="addPage"
                  >
                    Add
                  </button>
                </div>
              </div>
            </div>
          </div>

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
        </div>
      </div>
    </div>
    <div class="container">
      <div class="row w-100">
        <div v-for="page in pages" :key="page.order" class="col-sm-4">
          <div v-if="page.active">
            <PageMapper
              :header="page.header"
              :description="page.description"
              :order="page.order"
            />
          </div>
          <div v-else></div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import PageMapper from "./PageMapper.vue";
export default {
  name: "PageController",

  components: {
    PageMapper,
  },

  async mounted() {
    await axios
      .get("/admin/getAllPages")
      .then((response) => this.pages.push(...response.data));
  },

  data() {
    return {
      pages: [],
    };
  },

  methods: {
    updateHeader(text) {
      this.pageHeader = text;
    },

    updateDescription(text) {
      this.pageDescription = text;
    },

    updateDeletePageNumber(number) {
      this.deleteNumber = number;
    },

    async addPage() {
      const header = this.pageHeader;
      const desc = this.pageDescription;
      const order = await axios
        .get("/admin/getNumberOfPages")
        .then((response) => response.data);
      if (header != "" && desc != "") {
        await axios.post("/admin/addPage", {
          header: header,
          description: desc,
          active: true,
          order: order + 1,
        });
        this.pages.push({
          header: header,
          description: desc,
          active: true,
          order: order + 1,
        });
      }
    },

    async deletePage() {
      const pageToDeleteNumber = this.deleteNumber;
      const numPages = await axios
        .get("/admin/getNumberOfPages")
        .then((response) => response.data);
      if (pageToDeleteNumber <= numPages && pageToDeleteNumber > 0) {
        await axios.delete(`/admin/deletePage/${pageToDeleteNumber}`);
        this.pages.splice(pageToDeleteNumber, 1);
      }
    },

    editPage() {},

    orderPages() {},
  },
};
</script>
