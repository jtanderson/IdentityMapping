@extends('layouts.app')

@section('css')
  #c {
    border-style: solid;
    width: 750px;
    height: 750px;
  }
@endsection

@section('content')
<div class="row">
  <div class="col-sm">
    <h1><p text-center>Map your Identities</p>   </h1>   
    <div class="text text-right">
     
    </div>
    <div id="StartMapping" class="tabcontent">     
      This is the section where you choose the five social identities that are closest to you and map them onto the canvas where you see fit.
      To add social identities, simply type each one into the corresponding text box then click add circle. Once a circle has been added you can move them on the screen
      to be placed where you think they fit best.
      <br><br>
    </div> 
    <div class="row">
      <div class="col-sm-4">
        <br><br>

        @foreach ( $circles as $key => $value )
                <form action="#" id="circle-{{ $key }}" onsubmit="doSubmit(event);">
                <input type="text" name="circleText" id="textInput" style="width: 60%;">
                <input type="hidden" id="circle-{{ $key }}-{{ $value }}" value="{{ $value }}"/>
                <input type="submit" value="Add circle">
                </form>
              <br><br>
        @endforeach
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
    <br>   
  </div>
</div>

  @endsection


  @section('javascript')
  <script type="text/javascript" src="{{ asset('js/paper.js') }}"></script>
  <script type="text/paperscript" src="{{ asset('js/layering.js') }}" canvas="c"></script>

  <script type="text/javascript">
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
