@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col col-sm-12">
    <!-- <section class="jumbotron text-center wrapper" style="color: black;">
        <h1>Social Identity Mapping!</h1>
    </section> -->
    <section class="jumbotron text-center bg-primary" style="color: white;">
        <h1>Social Identity Mapping!</h1>
    </section> 
  </div>
</div>
<div class="row">
  <div class="col col-sm-12">
    <div class="lead">
          @php
            echo getTextContent('start-top-1');
          @endphp

          @php
            echo getTextContent('start-mid-2');
          @endphp
    </div>
  </div>
</div> <!-- End row 1 -->

<div class="container">
<div class="row">
  <div class="col col-sm-6">
      <figure class="figure" style=" height:100%;">
        <img src="{{ asset('img/sampleIdentities.png') }}" style="height:80%; width:100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
        <figcaption class="figure-caption">Examples of Identities</figcaption>
      </figure>
  </div>
  <div class="col col-sm-6">
      <figure class="figure" style=" height: 100%;">
        <img src="{{ asset('img/bigSmall.png') }}" style="height: 80%; width: 100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
        <figcaption class="figure-caption">Identities with magnitude</figcaption>
      </figure>
  </div>
  <!-- <div class="col col-sm-4">
    <figure class="figure" style="height: 90%;">
      <img src="{{ asset('img/sampleIdentities.png') }}" style="height: 80%; width: 100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
      <figcaption class="figure-caption">Examples of Identities</figcaption>
    </figure>
  </div> -->
</div>
</div>
@endsection
