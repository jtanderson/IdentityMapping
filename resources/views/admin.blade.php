@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
                
            <section class="jumbotron text-center bg-primary" style="color: white;">
                <h1>Admin Dashboard</h1>
            </section> 

            <button type="button" class="btn btn-success mb-4" onclick="window.location.href='/start'">Start Survey</button>
            <button type="button" class="btn btn-secondary mb-4" onclick="window.location.href='/admin/editsurveyquestions'">Edit Survey Questions</button>
            <button type="button" class="btn btn-secondary mb-4" onclick="window.location.href='/admin/content'">Edit Text Content</button>
            <button type="button" class="btn btn-secondary mb-4" onclick="window.location.href='/admin/editcategory'">Edit Categories</button>

            <div class="card mb-4">
                <div class="card-header">{{ __('Statistics') }}</div>
                <div class="card-body">
                <ul>
                  <li><h4>Active Questions: <small class="bold-stat">{{ $activeQuestions }}</small></h4></li>
                  <li><h4>Total Sessions: <small class="bold-stat">{{ $totalSessions }}</small></h4></li>
                  <li><h4>Category Count: <small class="bold-stat">{{ $categoryCount }}</small></h4></li>
                  <li><h4>Label Count: <small class="bold-stat">{{ $circleLabelCount }}</small></h4></li>
                      <li>
                          <h4>Top {{ count($circleLabels) }} Labels</h4>
                            <ul>
                              @foreach($circleLabels as $circleLabel)
                                  <li class="bold-stat">{{ $circleLabel }}</li>
                              @endforeach
                            </ul>
                      </li>
                </ul>
                </div>
            </div>

        </div>
    </div>
    <br/>
</div>
@endsection
