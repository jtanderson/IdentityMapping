<template>
    <div>
        <div id="toolbar"></div>
        <div class="card-body">
            <div :class="idword"></div>
        </div>
        <div class="mb-4 mx-auto row justify-content-center">
            <button
                type="button"
                class="btn btn-primary"
                data-toggle="modal"
                v-bind:data-target="idclass"
                v-on:click="updateText"
            >
                Save
            </button>
        </div>
        <!-- Modal -->
        <div
            class="modal fade"
            v-bind:id="idclass"
            tabindex="-1"
            role="dialog"
            v-bind:aria-labelledby="idclasslabel"
            aria-hidden="true"
        >
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" v-bind:id="idclasslabel">
                            {{ name }}
                        </h5>
                    </div>
                    <div class="modal-body">
                        Save successful!
                    </div>
                    <div class="modal-footer">
                        <button
                            type="button"
                            class="btn btn-secondary"
                            data-dismiss="modal"
                        >
                            Close
                        </button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    mounted() {
        let toolbarOptions = [
            [{ size: ["small", false, "large", "huge"] }], // custom dropdown
            [{ header: [1, 2, 3, 4, 5, 6, false] }],

            ["bold", "italic", "underline", "strike"], // toggled buttons

            [{ header: 1 }, { header: 2 }], // custom button values
            [{ indent: "+1" }, { indent: "-1" }], // outdent/indent

            [{ color: [] }, { background: [] }], // dropdown with defaults from theme

            ["clean"] // remove formatting button
        ];

        let options = {
            placeholder: "Add text content here...",
            theme: "snow",
            toolbar: "#toolbar",
            modules: {
                toolbar: toolbarOptions
            }
        };

        this.quill = new Quill(`.${this.idword}`, options); // hack way of doing this so quill doesnt break

        const delta = this.quill.clipboard.convert(this.content);
        this.quill.setContents(delta);

        console.log("INNTER HTML", this.quill.root.innerHTML);
        console.log("content-key: ", this.idword);
        console.log("CONTENT: ", this.content);
    },

    // What is passed into the component
    // need to pass in description too
    props: ["idword", "name", "content", "description"],

    data() {
        return {
            quill: "",
            idclass: `#${this.idword}`,
            idclasslabel: `${this.idword}Label`
        };
    },

    name: "TextContent",

    methods: {
        async updateText() {
            let newContent = this.quill.root.innerHTML;
            await axios
                .post("/admin/updateTextContent/" + `${this.idword}`, {
                    key: this.idword,
                    name: this.name,
                    content: newContent,
                    description: this.description
                })
                .then(response => {
                    // TODO: Alert user that content was saved
                    console.log(response);
                    const delta = this.quill.clipboard.convert(
                        response.data.content
                    );
                    this.quill.setContents(delta);
                });
        }
    }
};
</script>
