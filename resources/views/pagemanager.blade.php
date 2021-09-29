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
            <h2 class="text-center">Pages</h2>
            @foreach ($pages as $page)
              <h3>{{ $page->number }}</h3>
              <div class="card">
                <div class="card-body">
                  <h4>Header</h4>
                  {{ $page->header }}
                  <h4 class="mt-2">Description</h4>
                  {{ $page->description }}
                </div>
              </div>
              @endforeach
            <PageController />
        </div>
    </div>
</div>
@endsection @section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection @section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
@endsection
