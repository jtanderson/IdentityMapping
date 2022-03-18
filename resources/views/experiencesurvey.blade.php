@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<h1>User Experience Survey</h1>
<div class="row mb-4">
    <div class="col-sm mb-4">
        @php
        echo getTextContent('user-experience-top-1');
        @endphp
    </div>
</div>

@if (count($circles) == 0)

<h3>You have no circles plotted. Try the mapping tool and come back!</h3>

@else

@foreach ($surveyquestions as $number => $question)
@if ( $number % 2 == 0 )
<div class="row">
    <div class="col-sm">
        <div class="card-deck">
            @endif
            <div class="card text-center" style="max-width: 50rem; margin-bottom: 2%;">
                <div class="card-body">
                    <h5 class="card-title">{{ $question->text }}</h5>
                    <form>
                        <span style="margin-right: 2%;">{{ $question->extreme_left }}</span>
                        @for ($i = 1; $i <= intval($question->degrees); $i++)
                            <div class="form-check form-check-inline">
                                <input type="radio" class="survey-radio" name="question-{{ $question->id }}" value="{{ $i }}">
                            </div>
                            @endfor
                            <span style="margin-left: 2%;">{{ $question->extreme_right }}</span>
                    </form>
                </div>
            </div>
            @if ( $number % 2 == 1 )
        </div>
    </div>
</div>
@endif
@endforeach

@endif

<br>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/identityDebrief.js') }}"></script>
@endsection
