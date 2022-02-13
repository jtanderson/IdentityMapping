@extends('layouts.main')

@section('content')
<div class="container">
    <pagemanager v-bind:page="{{ $page }}" />
</div>
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/app.js') }}"></script>
@endsection
