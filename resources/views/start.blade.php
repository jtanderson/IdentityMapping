@extends('layouts.app')

@section('content')
  <section class="jumbotron text-center bg-primary" style="color: white; padding: 4rem, 12rem;">
      <h1>Social Identity Mapping!</h1>
  </section>

    <div class="container">
    <div class="text">
      Psychologists distinguish between our personal identities and our social identities.  Personal identities involve descriptions of our self, <span style="color: red">separate from others.</span>  
      Social identities involve descriptions of our bonds or <span style="color: red">connections</span> with other people or groups. 
       Human beings are social creatures. We all have <span style="color: #ff0000">connections or affiliations</span> with others.<br><br>

	    Social Identity Mapping is a tool that peple use to compare the data entered by the user to data of others. These are some examples of the possibilities that you can do with the circles. The goal is to layout the circles and name them in a way that fits you the best. The circles will appear on the screen one at a time in the order that you listed them. Every circle that appears on the map is to be moved to a region that you believe fits best. Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are completely random therefore you will need to resize each circle to fit what describes you the best. In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.<br><br>
    </div>

<div class="row">
  <div class="col col-sm-4">
      <figure class="figure" style=" height:90%;">
  <img src="/app/resources/img/inline.png" style="height:80%; width:100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption">This example demonstrates the aligning of your identities in a straight line which could describe your identities of equal importance.</figcaption>
</figure>
    </div>
    <div class="col col-sm-4">
        <figure class="figure" style=" height: 90%; width: 100%;">
  <img src="/app/resources/img/random.png" style="height: 80%; width: 100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption">This example shows a random mapping that could depict your interpretation of your identities in a unique way from something else.</figcaption>
</figure>
      </div>
      <div class="col col-sm-4">
          <figure class="figure" style="height: 90%;">
  <img src="/app/resources/img/bullsye.png" style="height: 80%; width: 100%;" class="figure-img img-fluid rounded" alt="A generic square placeholder image with rounded corners in a figure.">
  <figcaption class="figure-caption">This example is a popular mapping opf yoiur identities in a bullseye putting the most important identity at the center and smallest meaning most important.</figcaption>
</figure>
        </div>
</div>
<a href="terms.html">Terms and Conditions</a>

</div> <!-- close container -->
@endsection
