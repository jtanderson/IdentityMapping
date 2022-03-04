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
    <div>
      <b>
          @php
            echo getTextContent('consent-top-1');
          @endphp

          @php
            echo getTextContent('consent-top-2');
          @endphp
      </b>
    </div>
  </div>
</div>
@endsection
