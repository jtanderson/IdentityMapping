@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                  <p>Put some cursory stats here...</p>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <surveyquestion-component></surveyquestion-component>
</div>
@endsection
