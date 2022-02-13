@extends('layouts.app') 

@section('content')
<div>
    <div class="container mb-4">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <button
                    type="button"
                    class="btn btn-outline-primary"
                    onclick="window.location.href='/admin/page-manager'"
                >
                    &laquo; Back
                </button>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-12">
                <editsurveypage v-bind:page="{{ $page }}"></editsurveypage>
            </div>
        </div>
    </div>
</div>
@endsection
