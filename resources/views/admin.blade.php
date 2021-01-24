@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <ul>
                <!-- Accessing the variable $activeQuestions set in the AdminController so that we can return the number of active questions as a stat at the top of the admin dashboard -->
                  <li><h4>Active Questions: <small class="bold-stat">{{ $activeQuestions }}</small></h4></li>
                </ul>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <surveyquestion-component></surveyquestion-component>
</div>
@endsection
