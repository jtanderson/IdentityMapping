window.onload = function(){
  var radios = document.getElementsByClassName('survey-radio');

  for(var i=0; i<radios.length; i++){
    radios[i].onchange = function(evt){
      console.log(evt);
      console.log(evt.target);
      var nameParts = evt.target.name.split('-');
      $.post('/saveSurveyQuestion', {
        surveyable_id: nameParts[1],
        question_id: nameParts[3],
        surveyable_type: nameParts[0],
        answer: evt.target.value, 
      }).done(function(result){
      });
    };
  }
};
