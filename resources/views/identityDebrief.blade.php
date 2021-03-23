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
</div>

@foreach ($surveyquestions as $number => $question)
  @if ( $number % 2 == 0 )
  <div class="row">
    <div class="col-sm">
      <div class="card-deck">
  @endif
      <div class="card text-center" style="width: 30rem; margin-bottom: 2%;">
        <div class="card-body">
          <h5 class="card-title">{{ $question->text }}</h5>
          @foreach ($circles as $index => $circle)
            <hr/>
            <!-- Not sure if this mb-2 worked -->
            <b class="mb-2">{{ $circle['label'] }}</b> 
            <form> 
              <span style="margin-right: 2%;">{{ $question->extreme_left }}</span>
              @for ($i = 1; $i <= intval($question->degrees); $i++)
                <div class="form-check form-check-inline">
                  @if ( $i == $question->answer )
                    <input type="radio" class="survey-radio"  name="circle-{{ $circle->id }}-question-{{ $question->id }}" value="{{ $i }}" checked>
                  @else
                    <input type="radio" class="survey-radio"  name="circle-{{ $circle->id }}-question-{{ $question->id }}" value="{{ $i }}">
                  @endif
                </div>
              @endfor
              <span style="margin-left: 2%;">{{ $question->extreme_right }}</span>
            </form>
          @endforeach
        </div>
      </div>
  @if ( $number % 2 == 1 )
      </div>
    </div>
  </div>
  @endif
@endforeach

<br>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/identityDebrief.js') }}"></script>
@endsection
  