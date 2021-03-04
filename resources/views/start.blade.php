@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col col-sm-12">
    <section class="jumbotron text-center wrapper" style="color: black;">
        <h1>Social Identity Mapping!</h1>
    </section>
    <!-- <section class="jumbotron text-center bg-primary" style="color: white;">
        <h1>Social Identity Mapping!</h1>
    </section> -->
  </div>
</div>
<div class="row">
  <div class="col col-sm-12">
    <div class="lead">
          @php
            echo getTextContent('start-top-1');
          @endphp

          @php
            echo getTextContent('start-top-2');
          @endphp
          Social Identity Mapping is a tool that people use to compare the data entered by the user to data of others. These are some examples of the possibilities that you can do with the circles. The goal is to layout the circles and name them in a way that fits you the best. The circles will appear on the screen one at a time in the order that you listed them. Every circle that appears on the map is to be moved to a region that you believe fits best. Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are completely random therefore you will need to resize each circle to fit what describes you the best. In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.<br><br>
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
