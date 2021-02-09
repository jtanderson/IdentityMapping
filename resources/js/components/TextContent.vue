<template>
    <div class="card mb-4">
        <div class="card-header">{{ title }}</div>
        <div id="toolbar"></div>
        <div class="card-body">
            <div id="editor"></div>
        </div>
        <div class="mb-4 mx-auto">
            <button
                class="btn btn-primary rounded m-auto"
                v-on:click="getQuillContents"
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
            // Need to change this to the value of the text that is currently on the page
            placeholder: "Add text content here...",
            theme: "snow",
            toolbar: "#toolbar",
            modules: {
                toolbar: toolbarOptions
            }
        };

        this.quill = new Quill("#editor", options);
        console.log(this.content);
        this.quill.setText(this.content);
    },

    // What is passed into the component
    props: ["title", "content"],

    data() {
        return {
            quill: ""
        };
    },

    methods: {
        getQuillContents: function(event) {
            let delta = this.quill.getContents();
            // This is the full navigation to the text within the quill box
            console.log(delta.ops[0].insert);
        }
    }
};
</script>
