@extends('layouts.app')

@section('content')
PUT THE PAPER CANVAS AND STUFF HERE<br>
Var 1 is: {{ $var1 }} <br>
Var 2 is: {{ $var2 }}
@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/paper.js') }}"></script>
<script type="text/javascript" src="{{ asset('js/layering.js') }}"></script>
@endsection
