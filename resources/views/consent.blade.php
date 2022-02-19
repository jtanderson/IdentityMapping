@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col col-sm-12">
    <section class="jumbotron text-center bg-primary" style="color: white;">
        <h1>Survey Consent Form</h1>
    </section> 
  </div>
</div>
<div class="row">
  <div class="col col-sm-12">
    <div class="lead">
          @php
            echo getTextContent('consent-top-1');
          @endphp

          @php
            echo getTextContent('consent-top-2');
          @endphp
    </div>
  </div>
</div>
@endsection
