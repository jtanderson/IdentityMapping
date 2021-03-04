@extends('layouts.app')

@section('content')
<div>
<h1 class="text-center mb-5 mt-4 font-weight-bold">Text Content Editor</h1>
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

            <!-- Want this to be an 'accordian' drop down style for these text editors so that the page does not look repetetive and overwhelming to the user -->

            <div>
            @foreach ( $contents as $content )
                <TextContent idword="{{ $content->key }}" content="{{ $content->content }}" name="{{ $content->name }}" description="{{ $content->description }}"></TextContent>
            @endforeach
            </div>

        </div>
    </div>
</div>
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection 

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

