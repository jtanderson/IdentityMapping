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
      <label for='intersection-{{ $intersection->id }}'>Please describe the overall nature of the <strong>{{ $intersection->viewLabel }}</strong> intersection in terms of emotions behaviors, and time invested.</label>
      <textarea class='form-control' name="intersection-explanation" id='intersection-{{ $intersection->id }}' rows='3'>{{ $intersection->explanation }}</textarea>
    </div>
    @endforeach
  </form>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/intersectionDebrief.js') }}"/>
@endsection
