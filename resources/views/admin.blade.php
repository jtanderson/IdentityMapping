@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card mb-4"> 
                <div class="card-header">{{ __('/start page context') }}</div>
                <div class="card-body">
                  <div id="editor">hi</div>
                </div>
            </div>
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
<script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>

<!-- Initialize Quill editor -->
<script>
  var quill = new Quill('#editor');
</script>
@endsection
