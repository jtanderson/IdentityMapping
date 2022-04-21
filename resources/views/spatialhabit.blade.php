@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<h1>Visualization Questions</h1>
<div class="row mb-4">
    <div class="col-sm mb-4">
        @php
        echo getTextContent('spatial-habit-top-1');
        @endphp
    </div>
</div>

<form id="spatialHabit">
    @foreach ($spatialhabitquestions as $number => $question)
    @if ( $number % 2 == 0 )
    <div class="row">
        <div class="col-sm">
            <div class="card-deck">
                @endif
                <div class="card text-center" style="max-width: 50rem; margin-bottom: 2%;">
                    <div class="card-body">
                        <h5 class="card-title">{{ $question->text }}</h5>
                        <div>
                            <span style="margin-right: 2%;">{{ $question->extreme_left }}</span>
                            @for ($i = 1; $i <= intval($question->degrees); $i++)
                                <div class="form-check form-check-inline">
                                    <input type="radio" class="survey-radio" name="question-{{ $question->id }}" id="{{ $question->id }}" value="{{ $i }}">
                                </div>
                                @endfor
                                <span style="margin-left: 2%;">{{ $question->extreme_right }}</span>
                        </div>
                    </div>
                </div>
                @if ( $number % 2 == 1 )
            </div>
        </div>
    </div>
    @endif
    @endforeach
</form>

<br>
@endsection

@section('javascript')
<script>
    window.onload = function() {
        var form = document.getElementById("spatialHabit");

        form.addEventListener("change", function(evt) {
            var data = {
                key: evt.target.id
                , value: evt.target.value
            };

            console.log(data);

            $.post("/saveSpatialHabitAnswer", data).done(function(
                response
            ) {});
        });
    };

</script>

@endsection
