window.onload = function () {
    var form = document.getElementById("experienceSurvey");

    form.addEventListener("change", function (evt) {
        var data = {
            key: evt.target.id,
            value: evt.target.value,
        };

        console.log(data);

        $.post("/saveExperienceSurveyAnswer", data).done(function (
            response
        ) {});
    });
};
