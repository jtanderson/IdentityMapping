@extends('layouts.main')

@section('content')

<div class="row">
  <div class="col-sm">
    <h1>
      Categorize Your Identities
    </h1>
  </div>
</div>
<div class="row">
  @foreach ( $circles as $circle )
  <div class="col-sm-2">
    {{ $circle->label }}:
    <select name="circle-{{ $circle->id }}-category" class="category-select form-control">
      <option value=""></option>
      @foreach ( $categories as $category )
        @if ( $circle->category_id == $category->id )
          <option value="{{ $category->id }}" selected>{{ $category->name }}</option>
        @else
          <option value="{{ $category->id }}">{{ $category->name }}</option>
        @endif
      @endforeach
    </select>
  </div>
  @endforeach
</div>

@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/category.js') }}"></script>
@endsection
