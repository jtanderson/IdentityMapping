@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <button type="button" class="btn btn-primary mb-4" onclick="window.location.href='/admin/content'">Edit Text Content</button>
            <button type="button" class="btn btn-success mb-4" onclick="window.location.href='/start'">Start Survey</button>

            <div class="card mb-4">
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
    <surveyquestion-component />
</div>
@endsection



