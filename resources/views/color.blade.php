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

      <h1><p text-center>Style your Identities</p>   </h1>
      <div class="text text-right">

      </div>
      <div id="StartMapping" class="tabcontent">
        This section is where you add some detail to your map. In this section you may add either a red color for a negative impact on your life. Or you may add the color blue to your circle meaning that this identity makes you content.<br>
        <div id="detail" class="tabcontent">
          <br>To add color to your circle, use the slider below the form where entering the circles identity. This slider starts at white then goes from red to purple to blue. To the right of the color slider are two radio buttons where you can select the outline of the circle to be either solid or a dotted outline to represent a "conflicted" relationship. After you input your five identities, you can choose the color of the intersecting cirles on the map using the "Intersection Slider". <br><br>
        </div>

      </div>
      
      <div class="row">
        <div class="col-sm-11">

        </div>
      </div>
      <div class="row">
        <div class="col-sm-4">
          <h5>Active Item Color:<br></h5>
          <div class="bg" style="">
            <img style="width: 100%;" src="{{ asset('img/colorSlider.png') }}"/>
            <input style="width: 100%" type="range" id="rangeIntersect" min="0"  max="100" value = "0"/>&emsp;
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

          <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-label" value="{{ $value ? $value['label'] : "" }}"/>
          <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-center-x" value="{{ $value ? $value['center_x'] : "" }}"/>
          <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-center-y" value="{{ $value ? $value['center_y'] : "" }}"/>
          <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-radius" value="{{ $value ? $value['radius'] : "" }}"/>
          <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-color" value="{{ $value ? $value['color'] : "" }}"/>
          <input type="hidden" name ="circle-{{ $key }}" id="circle-{{ $key }}-line_style" value="{{ $value ? $value['line_style'] : "" }}"/>
          <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-id" value="{{ $value ? $value['id'] : "" }}" />


        @endforeach


        @foreach ( $intersections as $index => $int )
        <div>
          <input type="hidden" name="int-id" id="int-{{ $int->id }}-id" value="{{ $int->id }}" />
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c1" value="{{ $int->circle1_id }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c2" value="{{ $int->circle2_id }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c3" value="{{ $int ? $int->circle3_id : "" }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c4" value="{{ $int ? $int->circle4_id : "" }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-c5" value="{{ $int ? $int->circle5_id : "" }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-color" value="{{ $int ? $int->color : "" }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-area" value="{{ $int ? $int->area : "" }}"/>
          <input type="hidden" name="int-{{ $int->id }}" id="int-{{ $int->id }}-line_style" value="{{ $int ? $int->line_style : "" }}"/>
        </div>
        @endforeach

        <div class="col-sm-8">
          <canvas id="c" resize></canvas>
        </div>
      </div>
    </div>
  </div>
  @endsection

  @section('javascript')
    <script type="text/javascript" src="{{ asset('js/paper.js') }}"></script>
    <script type="text/paperscript" src="{{ asset('js/color.js') }}" canvas="c"></script>
  <script>
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
