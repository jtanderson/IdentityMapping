  @extends('layouts.main')

  @section('content')
  <div class="container">
    <h1>
        Tell Us About Your Intersections
    </h1>

    <br>   
  <form>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">What do your intersections mean?</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

      @foreach ($intersections as $intersection)
      <div class='form-group'>
        <label for='exampleFormControlTextarea1'>Please describe the overall nature of the {{ $intersection->viewLabel }} in terms of emotions behaviors, and time investment."</label>
        <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea>
      </div>

      @endforeach


  </form>
     </div>
  @endsection


