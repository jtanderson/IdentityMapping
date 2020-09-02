@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<h1> Description</h1>
<div class="row">
  <div class="col-sm">
    <p>Now that your map is complete, we are going to ask you some questions about your social identities. <b>Please respond to the following questions thinking about each identity one at a time.</b></p>
  </div>
  @foreach ($surveyquestions as $number => $question)
    @if ( $number % 2 == 0 )
    <div class="row">
      <div class="col-sm">
        <div class="card-deck">
    @endif
        <div class="card" style="width: 30rem;">
          <div class="card-body">
            <h5 class="card-title">{{ $question->text }}</h5>
            @foreach ($circles as $index => $circle)
              <b>{{ $circle['label'] }}</b>
              <form> 
                {{ $question->extreme_left }}
                @for ($i = 1; $i <= intval($question->degrees); $i++)
                  <div class="form-check form-check-inline">
                    <input type="radio" name="circle-{{ $circle->id }}-question-{{ $question->id }}" value="{{ $i }}">
                  </div>
                @endfor
                {{ $question->extreme_right }}
              </form>
            @endforeach
          </div>
        </div>
    @if ( $number % 2 == 1 )
        </div>
      </div>
    </div>
    <br>
    @endif
  @endforeach
  <br><br>
@endsection
