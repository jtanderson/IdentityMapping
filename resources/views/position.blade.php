@extends('layouts.app')

@section('content')
PUT THE PAPER CANVAS AND STUFF HERE<br>
Var 1 is: {{ $var1 }} <br>
Var 2 is: {{ $var2 }} <br>

<canvas id="myCanvas"></canvas>
@endsection

@section('javascript')
<script type="text/paperscript" src="{{ asset('js/layering.js') }}" canvas="myCanvas"></script>
@endsection
