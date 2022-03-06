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
            <button type="button" class="btn btn-primary" id="myBtn">Video Tutorial</button>

            <div id="myModal" class="modal">

                <div class="modal-content">
                    <span class="close">&times;</span>
                    <div class="text text-center">
                        <iframe width="720" height="400" src="https://www.youtube.com/embed/tgbNymZ7vqY">
                        </iframe>
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
