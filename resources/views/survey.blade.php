  @extends('layouts.main')

  @section('css')
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  @endsection

  @section('content')

  <h1> Description</h1>
  <div class="row">
  <div class="col-sm">
  Now that your map is complete, we are going to ask you some questions about those five identities. <b>Please respond to the following questions thinking about each identity one at a time.</b>
  <br>
  <br>
    <div class="row">
      <div class="col-sm">

        @foreach ($surveyquestions as $number => $question)
        <div class="col-sm">
        <br>
          {{ $question->text }}
        <br>
        @foreach ($circles as $index => $circle)
        <div class="slidecontainer">
            <b>{{ $circle['label'] }}</b>
        <form> 
          {{ $surveyquestions[0]->extreme_left }}
          <label class="radio-inline">
            <input type="radio" name="optradio" value="1">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="2">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="3">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio"  value="4">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="5">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="6">&emsp;
          </label>
          <label class="radio-inline">
            <input type="radio" name="optradio" value="7">&emsp;
          </label>
          {{ $surveyquestions[0]->extreme_right }}
        </form>
      </div>

      @endforeach

      </div>

      @endforeach
      
  </div></div>

  @endsection