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



            <!-- These can easily be put into a Vue component, I just want to get Quill working first -->
            <div class="card mb-4"> 
                <div class="card-header">{{ __('Start Page Context') }}</div>
                <div class="card-body">
                  <div id="toolbar">
                    <button class="ql-bold">Bold</button>
                    <button class="ql-italic">Italic</button>
                  </div>
                  <div id="editor">
                    <p>Start page context here ...</p>
                  </div>
                </div>
            </div>

            <div class="card mb-4"> 
                <div class="card-header">{{ __('Position Page Context') }}</div>
                <div class="card-body">
                  <div id="toolbar">
                    <button class="ql-bold">Bold</button>
                    <button class="ql-italic">Italic</button>
                  </div>
                  <div id="editor">
                    <p>Position page context here ... </p>
                  </div>
                </div>
            </div>

            <div class="card mb-4"> 
                <div class="card-header">{{ __('Color Page Context') }}</div>
                <div class="card-body">
                  <div id="toolbar">
                    <button class="ql-bold">Bold</button>
                    <button class="ql-italic">Italic</button>
                  </div>
                  <div id="editor">
                    <p>Color page context here ... </p>
                  </div>
                </div>
            </div>

            <div class="card mb-4"> 
                <div class="card-header">{{ __('Identity Debrief Page Context') }}</div>
                <div class="card-body">
                  <div id="toolbar">
                    <button class="ql-bold">Bold</button>
                    <button class="ql-italic">Italic</button>
                  </div>
                  <div id="editor">
                    <p>Identity debrief context here ... </p>
                  </div>
                </div>
            </div>

            <div class="card"> 
                <div class="card-header">{{ __('Demographics Page Context') }}</div>
                <div class="card-body">
                  <div id="toolbar">
                    <button class="ql-bold">Bold</button>
                    <button class="ql-italic">Italic</button>
                  </div>
                  <div id="editor">
                    <p>Demographics context here ... </p>
                  </div>
                </div>
            </div>
        </div>
    </div>
    <br/>
    <surveyquestion-component></surveyquestion-component>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection


