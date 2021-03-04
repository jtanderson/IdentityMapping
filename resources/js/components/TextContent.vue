<template>
    <div class="card mb-4">
        <div class="card-header font-weight-bold">
            {{ name }}
            <span class="ml-2 font-weight-light float-right">{{
                description
            }}</span>
        </div>
        <div id="toolbar"></div>
        <div class="card-body">
            <div :class="idword"></div>
        </div>
        <div class="mb-4 mx-auto">
            <button
                class="btn btn-primary rounded m-auto"
                v-on:click="updateText"
            >
                Save
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

        console.log("INNTER HTML", this.quill.root.innerHTML);
        console.log("content-key: ", this.idword);
        console.log("CONTENT: ", this.content);
    },

    // What is passed into the component
    // need to pass in description too
    props: ["idword", "name", "content", "description"],

    data() {
        return {
            quill: ""
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
