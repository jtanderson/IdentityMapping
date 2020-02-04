@extends('layouts.app')

@section('content')
<script>
var reset = function(){
        var cLayer = paper.project.getItem({data: {layerName: "circles"}});
      var iLayer = paper.project.getItem({data: {layerName: "intersections"}});
      var tLayer = paper.project.getItem({data: {layerName: "text"}});
      cLayer.removeChildren();
      iLayer.removeChildren();
      tLayer.removeChildren();
      }
var previous = function(){
        localStorage["saved"] = paper.project.exportJSON();
        localStorage["previous"] = "true";
        window.history.back();
      }

var save=function(){
        localStorage["circles"] = paper.project.layers[0].children[4].id;
        localStorage["intersect"] = paper.project.layers[1].children;
        localStorage["text"] = paper.project.layers[2].children;
        localStorage["proj"] = paper.project.exportJSON();

        var surveyData = [];

        var output = [];
        var names = [];
        var ar;
 
      }


  </script>

     <style>
      .bg{
        background-image: url("img/colorSlider.PNG");
        background-size: 100%;
      }
         #html, body{
    font-family: "Times New Roman", Times, serif;
    font-size: 20px;
  }
	  .container {
	    position: relative; 
	    width: 98%; /* Maximum width */	  
	  }
	  input{
	    text-align: center;
	    content:300px 200px;
	  }	  
	  input#textInput{
	    text-align: left;
	  }
	  .canvas-container{
	  margin: 0 auto;
	  }
	  canvas[resize] {
	    border-style: solid;
	    width: 750px;
	    height: 750px; 
	  }
	  p.ex1 {
	  display: none;
	  }
	  .container{
	    width: 100%;
	  }	  
    </style>

    <div class="container">

      <div class="row">
        <div class="col-sm">

          <h1><p text-center>Style your Identities</p>   </h1>
<div class="text text-right">

</div>
          <div id="StartMapping" class="tabcontent">
            This section is where you add some detail to your map. In this section you may add either a red color for a negative impact on your life. Or you may add the color blue to your circle meaning that this identity makes you content.<br>
            <div id="detail" class="tabcontent">
              <br>To add color to your circle, use the slider below the form where entering the circles identity. This slider starts at white then goes from red to purple to blue. To the right of the color slider are two radio buttons where you can select the outline of the circle to be either solid or a dotted outline to represent a "conflicted" relationship. After you input your five identities, you can choose the color of the intersecting cirles on the map using the "Intersection Slider". <br>
            </div>

          </div>
            
            <div class="row">
              <div class="col-sm-11">

              </div>
              <div class="col-sm-1">
                &emsp;
  <a class="btn btn-danger" href="finished.html">Abort</a>

              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                      
                <h5>Active Item Color:<br></h5>
                <div class="bg" style="width: 70%;">
                <input type="range" id="rangeIntersect" min="0"  max="100" value = "0"/>&emsp;
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

              <div class="col-sm-8">
                <canvas id="c" resize></canvas>
              </div>
            </div>
          </div>

          <br>
          <div>
          </div>
          </p>
        </div>
      <div class="row">
        <div class="col-sm-4">

        </div>
        <div class="col-sm-6">


        </div>
     
      </div>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/extended.js') }}"></script>
@endsection