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

      @foreach ($twoways as $int2)
      <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + {{ $int2->circle1_id }} + {{ $int2->circle2_id }} + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

      @foreach ($threeways as $int3)

        <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + {{ $int3->circle1_id }} + {{ $int3->circle2_id }} + {{ $int3->circle3_id }} + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

      @foreach ($fourways as $int4)

        <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + {{ $int4->circle1_id }} + {{ $int4->circle2_id }} + {{ $int3->circle3_id }} + {{ $int4->circle4_id }} + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

      @foreach ($fiveways as $int5)

        <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + {{ $int5->circle1_id || "" }} + {{ $int5->circle2_id || "" }} + {{ $int5->circle3_id || "" }} + {{ $int5->circle4_id || "" }} + {{ $int5->circle5_id || ""}} + " intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

  </form>
     </div>
  @endsection


