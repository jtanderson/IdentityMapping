@extends('layouts.main')

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
        @foreach ( $circles as $key => $value )
          <form action="#" class="form-inline" id="circle-{{ $key }}-form" onsubmit="doSubmit(event);">
            <div class="form-group mb-2">
              <input type="text" class="form-control" name="circle-{{ $key }}" id="circle-{{ $key }}-label" value="{{ $value ? $value['label'] : "" }}" style="">
            </div>
            <button type="submit" class="btn btn-primary mb-2">Add Circle</button>
            <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-center-x" value="{{ $value ? $value['center_x'] : "" }}"/>
            <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-center-y" value="{{ $value ? $value['center_y'] : "" }}"/>
            <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-radius" value="{{ $value ? $value['radius'] : "" }}"/>
            <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-color" value="{{ $value ? $value['color'] : "" }}"/>
            <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-line_style" value="{{ $value ? $value['line_style'] : "" }}"/>
            <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-id" value="{{ $value ? $value['id'] : "" }}" />
          </form>
          <br><br>
        @endforeach
      </div>
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
