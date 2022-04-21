@extends('layouts.main')

@section('content')
<div class="container">
    <h1>
        Tell Us About Your Intersections
    </h1>

    <br />

    @if (count($intersections) == 0)

    <h3>You have no intersections. Go back and add some!</h3>

    @else

    <form id="intersectionDebrief">
        @foreach ($intersections as $number => $intersection)
        <div class="row">
            <div class="col">
                <div class="card-deck">
                    <div class="card text-center" style="width: 100%; margin-bottom: 2%;">
                        <div class="card-body">
                            <h5 class="card-title">Please describe the overall nature of the {{ $intersection->viewLabel }} intersection in terms of emotions, behaviors, and time invested</h5>
                            @foreach($harmonyQuestions as $harmonyQuestion)
                            <div style="padding: 50px; margin-top: 12px; margin-bottom: 12px;">
                                <p style="margin-right: 2%; width: 40ch; float: left; text-align: left;">{{ $harmonyQuestion->extreme_left }}</p>
                                @for ($i = 1; $i <= intval($harmonyQuestion->degrees); $i++)
                                    <div class="form-check form-check-inline">
                                        <input type="radio" class="survey-radio" name="question-{{ $harmonyQuestion->id }}" id="{{ $harmonyQuestion->id }}" value="{{ $i }}">
                                    </div>
                                    @endfor
                                    <p style="margin-left: 2%; width: 40ch; float: right; text-align: right;">{{ $harmonyQuestion->extreme_right }}</p>
                            </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endforeach
    </form>

    @endif

</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/intersectionDebrief.js') }}"></script>
@endsection
