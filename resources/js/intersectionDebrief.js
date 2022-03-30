console.log("HERE");
window.onload = function () {
    var form = document.getElementById("intersectionDebrief");

    form.addEventListener("change", function (evt) {
        var data = {
            key: evt.target.id,
            value: evt.target.value,
        };

        console.log(data);

        $.post("/saveIntersectionHarmony", data).done(function (response) {});
    });
};
