@extends('layouts.app')

@section('css')
#c {
  border-style: solid;
  width: 750px;
  height: 750px;
}
@endsection

@section('content')
    <div class="container">
      <div class="row">
        <div class="col-sm">
          <h1><p text-center>Map your Identities</p>   </h1>   
      <div class="text text-right">
 
      </div>
          <div id="StartMapping" class="tabcontent">     
This is the section where you choose the five social identities that are closest to you and map them onto the canvas where you see fit.
To add social identities, simply type each one into the corresponding text box then click add circle. Once a circle has been added you can move them on the screen
to be placed where you think they fit best.
          </div> 
          <div class="container">
            
            <div class="row">
            <div class="col-sm-10">

            </div>
              <div class="col-sm-2">
                         &emsp;<a class = "btn btn-warning" onClick="reset();">Reset</a>
          <a class="btn btn-danger" href="finished.html">Abort</a>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-4">
                <br><br>
                <form action="#" onsubmit="doSubmit(event);">
                  <input type="text" name="circleText" id="textInput" style="width: 60%;">
                  <input type="hidden" name="formId" value="1"><!-- holds the SUid corresponding to this circle -->
                  <input type="submit" value="Add circle">
                </form>
<br><br>
                <form action="#" onsubmit="doSubmit(event);">
                  <input type="text" name="circleText" id="textInput" style="width: 60%;">
                  <input type="hidden" name="formId" value="2"><!-- holds the SUid corresponding to this circle-->
                  <input type="submit" value="Add circle">
                </form>
<br><br>
                <form action="#" onsubmit="doSubmit(event);">
                  <input type="text" id="textInput" style="width: 60%;">
                  <input type="hidden" name="formId" value="3"><!-- holds the SUid corresponding to this circle-->      
                  <input type="submit" value="Add circle">
                </form>
<br><br>
                <form action="#" onsubmit="doSubmit(event);">
                  <input type="text" id="textInput" style="width: 60%;">
                  <input type="hidden" name="formId" value="4"><!-- holds the SUid corresponding to this circle-->      
                  <input type="submit" value="Add circle">
                </form>
                <br><br>
                <form action="#" onsubmit="doSubmit(event);">
                  <input type="text" id="textInput" style="width: 60%;">
                  <input type="hidden" name="formId" value="5"><!-- holds the SUid corresponding to this circle-->      
                  <input type="submit" value="Add circle">
                </form>
          
                <br>
                <br>
                <br><br>
                <a href="https://faculty.salisbury.edu/~jtanderson/identitymapping/index.html">&larr;Previous </a>
                <a href="https://faculty.salisbury.edu/~jtanderson/identitymapping/extendedMapping.html" onClick = "save();">Next &rarr; </a>



            <p class="ex1">
                <input type="range" id="rangeIntersect" min="0" max="100" value = "0"/>&emsp;
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioIntersect1" value="option1">
                  <input class="form-check-input" type="radio" name="inlineRadioOptions" id="inlineRadioIntersect12" value="option2">
                  </p>    
              </div>
<script>
  function doFunction(){
    locked = true;
    console.log(locked);
  }
</script>
              <div class="col-sm-8">
                <canvas id="c" resize></canvas>
                <div class="text text-right">
                  </div>
              </div>
            </div>
          </div>
          <br>   
        </div></div>
    </div>

@endsection


@section('javascript')
<script type="text/javascript" src="{{ asset('js/paper.js') }}"></script>
<script type="text/paperscript" src="{{ asset('js/layering.js') }}" canvas="c"></script>
<script type="text/javascript">
      var save = function(){
        var tLayer = paper.project.getItem({data: {layerName: "text"}});
        localStorage["saved"] = paper.project.exportJSON();
        localStorage["one"] = tLayer.getItem({data: {textId: 1}}).content;
        localStorage["two"] = tLayer.getItem({data: {textId: 2}}).content;
        localStorage["three"] = tLayer.getItem({data: {textId: 3}}).content;
        localStorage["four"] = tLayer.getItem({data: {textId: 4}}).content;
        localStorage["five"] = tLayer.getItem({data: {textId: 5}}).content;
        localStorage["extended"] = true;
        var num = 1;
        for( i in paper.project.layers[1].children){
          if(paper.project.layers[1].children[i].closed){
            num++;
           }
          }
          var arr = new Array(num);
          var k = 0;
          for(j in paper.project.layers[1].children){
            if(paper.project.layers[1].children[j].closed){
                arr[k] = paper.project.layers[1].children[j].data.id;
                console.log(arr[k]);
                k++;
            }
          }
          localStorage["numIntersections"] = num;
          localStorage["intersections"] = arr;
      }
        var reset = function(){
          var cLayer = paper.project.getItem({data: {layerName: "circles"}});
        var iLayer = paper.project.getItem({data: {layerName: "intersections"}});
        var tLayer = paper.project.getItem({data: {layerName: "text"}});
        cLayer.removeChildren();
        iLayer.removeChildren();
        tLayer.removeChildren();
        }
      </script>
@endsection
