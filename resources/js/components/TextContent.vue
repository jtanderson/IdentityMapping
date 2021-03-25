<template>
    <div>
        <div id="toolbar"></div>
        <div class="card-body">
            <div :class="idword" v-on:click="changeButton"></div>
        </div>
        <div class="mb-4 mx-auto row justify-content-center">
            <button
                :disabled="isEdited"
                type="button"
                class="btn btn-primary"
                v-on:click="updateText"
            >
                {{this.buttonStatus}}
            </button>
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
        this.quill.on('text-change', function(delta, oldDelta, source) {
            this.isEdited = false;
        })
    },

    // What is passed into the component
    // need to pass in description too
    props: ["idword", "name", "content", "description"],

    data() {
        return {
            quill: "",
            idclass: `#${this.idword}`,
            buttonStatus: "Save",
            isEdited: true,
        };
    },

    name: "TextContent",

    methods: {

        changeButton() {
            this.isEdited = false;
            this.buttonStatus = "Save";
        },

        async updateText() {
            this.buttonStatus = "Saving..."
            let newContent = this.quill.root.innerHTML;
            await axios
                .post("/admin/updateTextContent/" + `${this.idword}`, {
                    key: this.idword,
                    name: this.name,
                    content: newContent,
                    description: this.description
                })
                .then(response => {
                    const delta = this.quill.clipboard.convert(
                        response.data.content
                    );
                    this.quill.setContents(delta);
                    setTimeout(() => {
                        this.buttonStatus = "Saved!"
                    }, 1500)
                });
        }
    }
};
</script>
