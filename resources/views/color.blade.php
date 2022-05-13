  @extends('layouts.main')

  @section('css')
  #c {
  border-style: solid;
  width: 730px;
  height: 730px;
  }
  .modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: rgb(0,0,0); /* Fallback color */
  background-color: rgba(0,0,0,0.4); /* Black w/ opacity */
  }

  /* Modal Content/Box */
  .modal-content {
  background-color: #fefefe;
  margin: 15% auto; /* 15% from the top and centered */
  padding: 20px;
  border: 1px solid #888;
  width: 80%; /* Could be more or less, depending on screen size */
  }

  /* The Close Button */
  .close {
  color: #aaa;
  float: right;
  font-size: 28px;
  font-weight: bold;
  }

  .close:hover,
  .close:focus {
  color: black;
  text-decoration: none;
  cursor: pointer;
  }
  @endsection

  @section('content')

  <div class="row">
      <div class="col-sm">

          <h1>
              <p text-center>Style your Identities</p>
          </h1>
          <div class="text text-right mb-4">
              <button type="button" class="btn btn-primary" id="myBtn">Additional Instructions</button>

              <div id="myModal" class="modal">

                  <div class="modal-content">
                      <span class="close">&times;</span>
                      <div class="text text-left">
                          <h1 class="mb-4 text text-center">Additional Instructions</h1>
                          <p>
                              This section is where you add some detail to your map. You have the option of leaving the circles as they are (i.e., without added color), or adding color using the slider continuum below. To add color to your circle, use the slider below the form where entering the circles identity. The color continuum reflects the range between strong negative emotions (red) to mixed negative and positive emotions (purple) to strong positive emotions (blue).
                              <br /><br />
                              Where you have overlapping circles, you may use different colors (or shades of color) for different parts of the circles. For example, one side of the set of circle may be red, the other side of the set of circles may be blue, and the conjoint area may be red, blue, or purple.
                              <br /><br />
                              For examples, you may add a range of shades of red color to signify the level of distress or negative emotion you associate with an identity. The deeper the red shade (i.e., closer to the end of the continuum) the more distress or negative emotion you associate with the identity.
                              <br /><br />
                              You may add a range of shades of blue color to signify the level of peacefulness or positive emotion you associate with an identity. The deeper the blue shade (i.e., closer to the end of the continuum) the more peaceful or positive emotion you associate with the identity.
                              <br /><br />
                              You may add a range of shades of purple color to signify the level of opposite emotions (both negative and positive) you associate with an identity. Shades of purple closer to red indicate that you experience more negatives than positive emotions with this identity, shades of purple closer to blue indicate that you experience more positives than negative emotions with this identity.
                              <br /><br />

                              Intersecting circles
                              On your map you may have indicated that one or more of your circles overlap with one or more other circles. If you have overlapping circles we would like to understand better how you interpret what it means to you that these circles overlap.
                              <br /><br />
                              Below the color slider are two radio buttons where you can select the outline of the circle to be either solid (default) or a dashed outline. You can change the solid lines around two (or more) overlapping circles into dashed lines.
                              <br /><br />
                              When you might use dashed lines: You should choose dashed lines if you believe that two (or more) conjointly overlapping circles represent your self-identities that intersect in a way that create unique dynamics and effects for you. That is, it is hard for you to disassociate your relative experience of one overlapping identity from the other.
                              <br /><br />
                              Examples of dashed intersecting identities that are challenging to disentangle
                              For example, if you were a Muslim woman wearing a Hijab and you faced discrimination, it may be difficult to disentangle and isolate the effect of being Muslim or being female as the identity dimension leading to your discrimination.
                              As another example, you may be a man who is European American (e.g., Caucasian/White) and who is as equally qualified for a job opening as your African-American female friend, but you get the job interview and she doesn’t. It may be hard to dissociate the role that r
                          </p>
                      </div>
                  </div>

              </div>

          </div>
          <div id="StartMapping" class="tabcontent mb-4">
              @php
              echo getTextContent('color-top-1');
              @endphp
              <div id="detail" class="tabcontent mt-4">
                  @php
                  echo getTextContent('color-top-2');
                  @endphp
              </div>

          </div>

          <div class="row">
              <div class="col-sm-11">

              </div>
          </div>
          <div class="row">
              <div class="col-sm-4">
                  <h5>Active Item Color:<br></h5>
                  <div class="bg">
                      <img style="width: 100%;" src="{{ asset('img/colorSlider.png') }}" />
                      <input style="width: 100%" type="range" id="rangeIntersect" min="0" max="100" value="0" />&emsp;
                  </div>
                  <br><br>
                  <h5>Circle Outline:</h5>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioIntersect1" value="option1">
                      <label class="form-check-label" for="inlineRadio1">Solid&emsp;&emsp;</label>
                  </div>
                  <div class="form-check form-check-inline">
                      <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioIntersect12" value="option2">
                      <label class="form-check-label" for="inlineRadio2">Dotted</label>
                  </div>

                  <br><br><br>
              </div>

              @foreach ( $circles as $key => $value )

              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-label" value="{{ $value ? $value['label'] : "" }}" />
              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-center-x" value="{{ $value ? $value['center_x'] : "" }}" />
              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-center-y" value="{{ $value ? $value['center_y'] : "" }}" />
              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-radius" value="{{ $value ? $value['radius'] : "" }}" />
              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-color" value="{{ $value ? $value['color'] : "" }}" />
              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-line_style" value="{{ $value ? $value['line_style'] : "" }}" />
              <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-id" value="{{ $value ? $value['id'] : "" }}" />


              @endforeach


              @foreach ( $intersections as $index => $int )
              <div>
                  <input type="hidden" name="int-id" id="int-{{ $int->id }}-id" value="{{ $int->id }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c1" value="{{ $int->circle1_id }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c2" value="{{ $int->circle2_id }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c3" value="{{ $int ? $int->circle3_id : "" }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c4" value="{{ $int ? $int->circle4_id : "" }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c5" value="{{ $int ? $int->circle5_id : "" }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-color" value="{{ $int ? $int->color : "" }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-area" value="{{ $int ? $int->area : "" }}" />
                  <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-line_style" value="{{ $int ? $int->line_style : "" }}" />
              </div>
              @endforeach

              <div class="col-sm-8">
                  <canvas style="background-color: white;" id="c" resize></canvas>
              </div>
          </div>
      </div>
  </div>
  @endsection

  @section('javascript')
  <script type="text/javascript" src="{{ asset('js/paper.js') }}"></script>
  <script type="text/paperscript" src="{{ asset('js/color.js') }}" canvas="c"></script>
  <script>
      var reset = function() {
          var cLayer = paper.project.getItem({
              data: {
                  layerName: "circles"
              }
          });
          var iLayer = paper.project.getItem({
              data: {
                  layerName: "intersections"
              }
          });
          var tLayer = paper.project.getItem({
              data: {
                  layerName: "text"
              }
          });
          cLayer.removeChildren();
          iLayer.removeChildren();
          tLayer.removeChildren();
      }

  </script>
  <script type="text/javascript">
      var modal = document.getElementById("myModal");

      // Get the button that opens the modal
      var btn = document.getElementById("myBtn");

      // Get the <span> element that closes the modal
      var span = document.getElementsByClassName("close")[0];

      // When the user clicks on the button, open the modal
      btn.onclick = function() {
          modal.style.display = "block";
      }

      // When the user clicks on <span> (x), close the modal
      span.onclick = function() {
          modal.style.display = "none";
      }

      // When the user clicks anywhere outside of the modal, close it
      window.onclick = function(event) {
          if (event.target == modal) {
              modal.style.display = "none";
          }
      }

  </script>
  @endsection
