@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<div class="row">
  <div class="col-sm">
    <h4>Finally, we would like some feedback on the survey itself. Please answer these questions so we may be able to improve upon this survey in the future.</h4>
  </div>
</div>

@foreach ( $questions as $question )
<div class="row">
  <div class="col-sm">
    <div class="card">
      <div class="card-body">
        <form name="surveyquestion-form">
          <div class="form-group">
            <label>{{ $question->text }}</label>
            <div class="">
              {{ $question->extreme_left }}
              @for ($i = 1; $i <= intval($question->degrees); $i++)
                <div class="form-check form-check-inline">
                  @if ( $i == $question->answer )
                    <input type="radio" class="survey-radio"  name="participant-{{ $participant->id }}-question-{{ $question->id }}" value="{{ $i }}" checked/>
                  @else
                    <input type="radio" class="survey-radio"  name="participant-{{ $participant->id }}-question-{{ $question->id }}" value="{{ $i }}"/>
                  @endif
                </div>
              @endfor
              {{ $question->extreme_right }}
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
</div>
@endforeach

<form action="{{ route('thanks') }}" method="post">
@csrf
<!-- Added the Comments / Feedback textarea here that was suggested in the readme list -->
<div class="row">
  <div class="col-sm">
    <div class="card">
      <div class="card-body">
        <div class="form-group">
          <label>Comments / Feedback</label>
          <div class="">
            <textarea style="resize:none;" id="comments" name="comments" rows="4" cols="50" ></textarea>
          </div>
        </div>
        <div class="text-center">
          <input class="btn btn-success" type="submit" value="Finish"/>
        </div>
      </div>
    </div>
  </div>
</div>

</form>

@endsection


@section('javascript')
<script type="text/javascript" src="{{ asset('js/end.js') }}"></script>
@endsection
