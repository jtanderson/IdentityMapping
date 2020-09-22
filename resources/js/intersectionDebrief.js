window.onload = function(){
  document.getElementById('intersection-meaning').onchange = function(){
    $.post('/saveMeaning', {
      'meaningText': document.getElementById('intersection-meaning').value
    })
    .done(function(result){
    });
  }

  var intExplanations = document.getElementsByName('intersection-explanation');
  // Time for closures!
  for(var j=0; j < intExplanations.length; j++){
    intExplanations[j].onchange = function(j){
      var i = j;
      return function(evt){
        $.post('/saveExplanation', {
          'id': intExplanations[i].id.split('-')[1],
          'explanation': intExplanations[i].value
        })
        .done(function(result){
        });
      }
    }(j);
  }
};
