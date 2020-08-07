@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<div class="text text-left">
    <h4>Finally, we would like some feedback on the survey itself. Please answer these questions so we may be able to improve upon this survey in the future.</h4>
    <br><br>
</div>

<div class="row">
    <h5>Was this survey easy to use?</h5>
    <br>
      <form>&emsp;Easy to use &emsp;
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
            Difficult to use
     </form>

	<h5>Did you complete this survey in a timely matter?</h5>
	<br>
      <form>&emsp;Able to complete quickly &emsp;
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
            Took a while to complete
     </form>
	
	</div>
</div>

<br><br>

<div class="col-sm">
    <h1><p align="center">Thank You!</p></h1>    
</div>

@endsection


@section('javascript')
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
@endsection