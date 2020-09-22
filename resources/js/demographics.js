window.onload = function(){
  var form = document.getElementById('demographics');

  form.addEventListener('change', function(evt){
    var data = {
      key: evt.target.id,
      value: evt.target.value
    };

    console.log(data);

    $.post('/saveDemographics', data).done(function(response){
    });
  });
};
