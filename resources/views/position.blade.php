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
            <p text-center>Map your Identities</p>
        </h1>
        <div class="text text-right mb-4">
            <button type="button" class="btn btn-primary" id="myBtn">Additional Instructions</button>

            <div id="myModal" class="modal">

                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="text text-left">
                        <h1 class="mb-4 text text-center">Additional Instructions</h1>
                        <p>
                            Having listed your five social identities on the left side of the screen in their order of importance to you, you’ll notice that circles of varying sizes have appeared in random locations on the right side of the screen. Your goal is to layout the circles and name them in a way that fits you the best. The center of the mapping square reflects the center of yourself.
                            <br /><br />
                            The circles will appear on the screen one at a time in the order that you listed them. Once a circle has been added you can move them on the screen to be placed where you think they fit best. You should move every circle into such a position on the map as to reflect who you are. When deciding on the placement of your circles, consider how each relates to others in reflecting who you are.
                            <br /><br />
                            Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are originally completely random therefore you will need to resize each circle to fit what describes you the best. Your choice of size of circle is up to you.
                            <br /><br />
                            In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.
                        </p>
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
                        <span class="font-weight: bold; font-size: 24px;">{{$key}}.</span>
                        <input type="text" class="form-control ml-2" name="circle-{{ $key }}" id="circle-{{ $key }}-label" value="{{ $value ? $value['label'] : "" }}" style="">
                    </div>
                    <button type="submit" class="btn btn-primary ml-2 mb-2">Add Circle</button>
                    <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-center-x" value="{{ $value ? $value['center_x'] : "" }}" />
                    <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-center-y" value="{{ $value ? $value['center_y'] : "" }}" />
                    <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-radius" value="{{ $value ? $value['radius'] : "" }}" />
                    <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-color" value="{{ $value ? $value['color'] : "" }}" />
                    <input type="hidden" name="circle-{{ $key }}" id="circle-{{ $key }}-line_style" value="{{ $value ? $value['line_style'] : "" }}" />
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
