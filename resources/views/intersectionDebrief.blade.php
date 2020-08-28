@extends('layouts.main')

@section('content')
<div class="container">
  <h1>
      Tell Us About Your Intersections
  </h1>

  <br/>   
  <form>
    <div class="form-group">
        <label for="intersection-meaning">What do your intersections mean to you?</label>
        <textarea class="form-control" id="intersection-meaning" rows="3">{{ $meaning }}</textarea>
    </div>

    @foreach ($intersections as $intersection)
    <div class='form-group'>
      <label for='intersection-{{ $intersection->id }}'>Please describe the overall nature of the {{ $intersection->viewLabel }} in terms of emotions behaviors, and time invested."</label>
      <textarea class='form-control' name="intersection-explanation" id='intersection-{{ $intersection->id }}' rows='3'>{{ $intersection->explanation }}</textarea>
    </div>
    @endforeach
  </form>
</div>
@endsection

@section('javascript')
<script type="text/javascript">
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
      return function(){
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
</script>
@endsection
