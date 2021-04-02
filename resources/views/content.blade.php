@extends('layouts.app')

@section('content')
<div>

<div class="container mb-4">
    <div class="row justify-content-center">
        <div class="col-md-12">
        
        <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/admin'">&laquo; Back</button>

        </div>
    </div>
</div>


<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">

        <section class="jumbotron text-center bg-primary" style="color: white;">
            <h1>Text Content Editor</h1>
        </section> 
            <div id="accordion">
            @foreach ( $contents as $content )
                <div class="card">
                    <div class="card-header">
                    <a class="collapsed card-link" data-toggle="collapse" href="#{{ $content->key }}">
                        {{ $content->name }}
                        <span class="ml-2 font-weight-light float-right text-dark">
                            {{ $content->description }}
                        </span>
                    </a>
                    </div>
                    <div id="{{ $content->key }}" class="collapse" data-parent="#accordion">
                    <div class="card-body">
                        <TextContent idword="{{ $content->key }}" content="{{ $content->content }}" name="{{ $content->name }}" description="{{ $content->description }}"></TextContent>
                    </div>
                    </div>
                </div>
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

