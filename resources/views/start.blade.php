@extends('layouts.main')

@section('content')
<div class="row">
  <div class="col col-sm-12">
    <section class="jumbotron text-center bg-primary" style="color: white;">
        <h1>Social Identity Mapping!</h1>
    </section>
  </div>
</div>
<div class="row">
  <div class="col col-sm-12">
    <div class="lead">
          Psychologists distinguish between our personal identities and our social identities.  Personal identities involve descriptions of our self, <span style="color: red">separate from others.</span>  
          Social identities involve descriptions of our bonds or <span style="color: red">connections</span> with other people or groups. 
           Human beings are social creatures. We all have <span style="color: #ff0000">connections or affiliations</span> with others.<br><br>

          Social Identity Mapping is a tool that people use to compare the data entered by the user to data of others. These are some examples of the possibilities that you can do with the circles. The goal is to layout the circles and name them in a way that fits you the best. The circles will appear on the screen one at a time in the order that you listed them. Every circle that appears on the map is to be moved to a region that you believe fits best. Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are completely random therefore you will need to resize each circle to fit what describes you the best. In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.<br><br>
    </div>
    <div id="editor">LOLOLOLOLOL</div>
  </div>
</div> <!-- End row 1 -->

<div class="row">
  <div class="col col-sm-4">
      <figure class="figure" style=" height:90%;">
        <img src="{{ asset('img/bullseye.png') }}" style="height:80%; width:100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
        <figcaption class="figure-caption">This is an example identity configuration</figcaption>
      </figure>
  </div>
  <div class="col col-sm-4">
      <figure class="figure" style=" height: 90%; width: 100%;">
        <img src="{{ asset('img/inline.png') }}" style="height: 80%; width: 100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
        <figcaption class="figure-caption">This is an example identity configuration</figcaption>
      </figure>
  </div>
  <div class="col col-sm-4">
    <figure class="figure" style="height: 90%;">
      <img src="{{ asset('img/random.png') }}" style="height: 80%; width: 100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
      <figcaption class="figure-caption">This is an example identity configuration</figcaption>
    </figure>
  </div>
</div> <!-- End row 2 -->
<script src="../js/startcontext.js"></script>
@endsection
