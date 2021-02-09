window.Quill = require("quill");

let div = document.getElementsByClassName("editor");

let options = {
    modules: {
        toolbar: "#toolbar"
    },
    placeholder: "Enter words here",
    theme: "snow"
};

for (let i = 0; i < div.length; i++) {
    let divItem = div[i];
    let quill = new Quill(divItem, options);
}

window.onload = function() {
    console.log("HERE");
};
