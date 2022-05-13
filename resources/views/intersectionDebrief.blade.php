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
<div class="container">
    <h1>
        Tell Us About Your Intersections
    </h1>

    <div class="text text-right mb-4">
        <button type="button" class="btn btn-primary" id="myBtn">View Your Mapping</button>

        <div id="myModal" class="modal">

            <div class="modal-content" style="width: fit-content; padding: 10px;">
                <span class="close text text-right">&times;</span>
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
                    <canvas style="background-color: white;" width=" 800" height="800" id="c"></canvas>
                </div>
            </div>
        </div>
    </div>


    <br></br>

    @if (count($intersections) == 0)

    <h3>You have no intersections. Go back and add some!</h3>

    @elseif (count($intersections) < 4) <div>
        <div id="StartMapping" class="tabcontent">
            @php
            echo getTextContent('intersection-debrief-top-1');
            @endphp
            <br></br>
        </div>
        <form id="intersectionDebrief">
            @foreach ($intersections as $number => $intersection)
            <div class="row">
                <div class="col">
                    <div class="card-deck">
                        <div class="card text-center" style="width: 100%; margin-bottom: 2%;">
                            <div class="card-body">
                                <h5 class="card-title">Please describe the overall nature of the {{ $intersection->viewLabel }} intersection in terms of emotions, behaviors, and time invested</h5>
                                @foreach($harmonyQuestions as $harmonyQuestion)
                                <div style="padding: 50px; margin-top: 12px; margin-bottom: 12px;">
                                    <p style="margin-right: 2%; width: 40ch; float: left; text-align: left;">{{ $harmonyQuestion->extreme_left }}</p>
                                    @for ($i = 1; $i <= intval($harmonyQuestion->degrees); $i++)
                                        <div class="form-check form-check-inline">
                                            <input type="radio" class="survey-radio" name="question-{{ $harmonyQuestion->id }}" id="{{ $harmonyQuestion->id }}" value="{{ $i }}">
                                        </div>
                                        @endfor
                                        <p style="margin-left: 2%; width: 40ch; float: right; text-align: right;">{{ $harmonyQuestion->extreme_right }}</p>
                                </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </form>
</div>
@else
<div>
    <intersectiondebriefselector :intersections="{{ json_encode($intersections) }}" :questions="{{ json_encode($harmonyQuestions) }}"></intersectiondebriefselector>
</div>
@endif
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/intersectionDebrief.js') }}"></script>
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
@endsection
