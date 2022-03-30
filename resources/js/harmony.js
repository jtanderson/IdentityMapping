window.onload = function () {
    var form = document.getElementById("harmony");

    form.addEventListener("change", function (evt) {
        var data = {
            key: evt.target.id,
            value: evt.target.value,
        };

        console.log(data);

        $.post("/saveHarmony", data).done(function (response) {});
    });
};
