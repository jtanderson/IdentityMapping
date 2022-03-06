@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col col-sm-12">
    <section class="jumbotron text-center bg-primary" style="color: white;">
        <h1>Activity Description</h1>
    </section> 
  </div>
</div>
<div class="row">
  <div class="col col-sm-12">
    <div class="ql-editor">
        @php
          echo getTextContent('activity-description');
        @endphp
    </div>
  </div>
</div>
@endsection
