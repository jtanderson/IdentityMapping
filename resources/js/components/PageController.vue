<template>
    <div class="w-100">
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
                                    <h5
                                        class="modal-title"
                                        id="exampleModalLabel"
                                    >
                                        New Page
                                    </h5>
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
                                                <label class="mb-0"
                                                    >Page Header</label
                                                >
                                            </div>
                                            <textarea
                                                type="text"
                                                value=""
                                                class="mb-2 w-100"
                                                @input="
                                                    updateHeader(
                                                        $event.target.value
                                                    )
                                                "
                                            />
                                            <div>
                                                <label class="mb-0"
                                                    >Page Description</label
                                                >
                                            </div>
                                            <textarea
                                                type="text"
                                                value=""
                                                class="mb-2 w-100"
                                                @input="
                                                    updateDescription(
                                                        $event.target.value
                                                    )
                                                "
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
                </div>
            </div>
        </div>
        <div>
            <div class="row w-100">
                <SlickList
                    axis="x"
                    v-model="pages"
                    @sort-end="updateOrder"
                    class="d-flex"
                >
                    <SlickItem
                        v-for="(page, i) in pages"
                        :index="i"
                        :key="page.order"
                    >
                        <div v-if="page.active">
                            <PageMapper
                                style="user-select: none; cursor: pointer"
                                :view="toActivePage"
                                :delete="deletePage"
                                :edit="editPage"
                                :header="page.header"
                                :description="page.description"
                                :order="page.order"
                                :active="page.active"
                            />
                        </div>
                    </SlickItem>
                </SlickList>
            </div>
        </div>
    </div>
</template>

<script>
import PageMapper from "./PageMapper.vue";
import { SlickList, SlickItem } from "vue-slicksort";
export default {
    name: "PageController",

    components: {
        SlickList,
        SlickItem,
        PageMapper
    },

    async mounted() {
        this.pages = [];
        await axios
            .get("/admin/getAllPages")
            .then(response => this.pages.push(...response.data));

        console.log(this.pages);
    },

    data() {
        return {
            pages: [],
            index: 0
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
                .then(response => response.data);
            console.log(order);
            if (header != "" && desc != "") {
                await axios.post("/admin/addPage", {
                    header: header,
                    description: desc,
                    active: true,
                    order: order + 1
                });
                this.pages.push({
                    header: header,
                    description: desc,
                    active: true,
                    order: order + 1
                });
            }
        },

        async deletePage(order) {
            const pageToDeleteNumber = order;
            await axios.delete(`/admin/deletePage/${pageToDeleteNumber}`);
            this.pages.splice(
                this.pages.findIndex(page => page.order === pageToDeleteNumber),
                1
            );
        },

        async editPage(order) {
            const pageToEditNumber = order;
            console.log(pageToEditNumber);
        },

        toActivePage(order) {
            window.location.href = `/surveypage/${order}`;
        },

        async updateOrder(event) {
            await axios
                .get(
                    `/admin/changeOrder/${event.oldIndex + 1}/${event.newIndex +
                        1}`
                )
                .then(response => {
                    this.pages = [];
                    this.pages.push(...response.data);
                });
        }
    }
};
</script>
