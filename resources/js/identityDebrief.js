window.onload = function(){
  var radios = document.getElementsByClassName('survey-radio');

  for(var i=0; i<radios.length; i++){
    radios[i].onchange = function(evt){
      var nameParts = evt.target.name.split('-');
      $.post('/saveSurveyAnswer', {
        surveyable_id: nameParts[1],
        question_id: nameParts[3],
        surveyable_type: nameParts[0],
        answer: evt.target.value, 
      }).done(function(result){
      });
    };
  }
};
