@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <div class="card mb-4">
                <div class="card-header">{{ __('Dashboard') }}</div>
                <div class="card-body">
                <ul>
                <!-- Accessing the variable $activeQuestions set in the AdminController so that we can return the number of active questions as a stat at the top of the admin dashboard -->
                  <li><h4>Active Questions: <small class="bold-stat">{{ $activeQuestions }}</small></h4></li>
                </ul>
                </div>
            </div>

            
            <TextContent title="Start Page Content" content="{{ $textContent }}"></TextContent>


        </div>
    </div>
    <br/>
    <surveyquestion-component></surveyquestion-component>
</div>
@endsection

<!-- @section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
<script type="text/javascript" src="{{ asset('../../../../node_modules/quill/quill.js') }}"></script>
@endsection -->

@section('styles')
<link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
@endsection
@section('javascript')
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
@endsection


