window.onload = function(){
  var selects = document.getElementsByClassName('category-select');

  for(var i=0; i<selects.length; i++){
    selects[i].onchange = function(evt){
      var circleId = evt.target.name.split('-')[1];
      var catId = evt.target.value;
      $.post('/saveCategory', {
        circle_id: circleId,
        category_id: catId,
      }).done(function(result){
      });
    };
  }
};
