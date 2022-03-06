@extends('layouts.main')

@section('css')
  #c {
    border-style: solid;
    width: 730px;
    height: 730px;
  }
@endsection

@section('content')
<div class="row">
  <div class="col-sm">
    <h1><p text-center>Map your Identities</p>   </h1>   
    <div class="text text-right mb-4">
      <!-- Button trigger modal -->
      <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
        Tutorial Video
      </button>

      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Mapping Tutorial</h5>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
              Video or Gif here...
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
          </div>
        </div>
      </div>
     
    </div>
    <div id="StartMapping" class="tabcontent">     
        @php
          echo getTextContent('position-top-1');
        @endphp
      <br><br>
    </div> 
    <div class="row">
      <div class="col-sm-4">
        @foreach ( $circles as $key => $value )
          <form action="#" class="form-inline" id="circle-{{ $key }}-form" onsubmit="doSubmit(event);">
            <div class="form-group mb-2">
              <input type="text" class="form-control" name="circle-{{ $key }}" id="circle-{{ $key }}-label" value="{{ $value ? $value['label'] : "" }}" style="">
            </div>
            <button type="submit" class="btn btn-primary ml-2 mb-2">Add Circle</button>
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
        <canvas style="background-color: white;" id="c" resize></canvas>
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
  <script type="text/paperscript" src="{{ asset('js/position.js') }}" canvas="c"></script>

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
