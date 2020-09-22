window.onload = function(){
  var forms = document.getElementsByTagName('form');

  for(var i=0; i<forms.length; i++){
    forms[i].addEventListener('change', function(evt){
      console.log(evt.target);

      var data = {
        question_id: evt.target.name.split('-')[3],
        surveyable_id: evt.target.name.split('-')[1],
        surveyable_type: 'participant',
        answer: evt.target.value
      };

      console.log(data);

      $.post('/saveSurveyAnswer', data).done(function(response){
      });
    });
  }
};
