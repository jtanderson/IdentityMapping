@extends('layouts.app') @section('content')
<div>
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    onclick="window.location.href='/admin'"
                >
                    &laquo; Back
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <section
                    class="jumbotron text-center bg-primary"
                    style="color: white;"
                >
                    <h1>Page Manager</h1>
                </section>
            </div>
            <PageController></PageController>
        </div>
    </div>
</div>
@endsection @section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection @section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
