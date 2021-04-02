@extends('layouts.app')

@section('content')
<div class="container">
      <div class="row justify-content-center">
          <div class="col-md-4 mb-4">
            <button type="button" class="btn btn-outline-primary" onclick="window.location.href='/admin'">&laquo; Back</button>
          </div>
      </div>
    <category-component />
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/admin.js') }}"></script>
@endsection 

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css')}}">
@endsection

