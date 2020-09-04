@extends('layouts.main')

@section('css')
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
@endsection

@section('content')

<div class="row">
  <div class="col-sm">
    <h1>Demographics</h1>
    <div class="text text-left">
      <p>Please tell us aboiut yourself now so that we can compare you to people that are related to you in demographics. This will help in determining who you associate with and who you are likely to associate with in the future. After filling this out you will be prompted to the end of the survey where you can submit all of your work for final comparison and the assignment will be completed.</p>
    </div>
  </div>
</div>
<div class="row">
  <div class="col-sm-6">
    <form id="demographics" class="form">
      <div class="form-group">
        <label for="gender">What gender do you associate yourself with?</label>
        <select id="gender" class="form-control form-control-sm">
          <option value=""></option>
          <option value="male">Male</option>
          <option value="female">Female</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="age"> Please enter your age:</label>
        <input id="age" class="form-control" type="text"/>
      </div>
      <div class="form-group">
        <label for="isHispanic">Are you Hispanic, Latino or of Spanish origin?</label>
        <select id="isHispanic" class="form-control form-control-sm">
          <option value=""></option>
          <option value="yes">Yes</option>
          <option value="no">No</option>
        </select>
      </div>
      <div class="form-group">
        <label for="ethnicity">Ethnicity origin (or Race): Please specify your ethnicity.</label>
        <select id="ethnicity" class="form-control form-control-sm">
          <option value=""></option>
          <option value="white">White</option>
          <option value="hispanic">Hispanic or Latino</option>
          <option value="african american">Black or African American</option>
          <option value="native american">Native American or American Indian</option>
          <option value="asian">Asian/ Pacific Islander</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="marital"> What is your marital status?</label>
        <select id="marital" class="form-control form-control-sm">
          <option value=""></option>
          <option value="single">Single (never married)</option>
          <option value="married">Married or in a domestic partnership</option>
          <option value="widowed">Widowed</option>
          <option value="divorced">Divorced</option>
          <option value="separated">Separated</option>
          <option value="other">Other</option>
        </select>
      </div>
      <div class="form-group">
        <label for="degree">What is the highest degree or level of school you have completed? (If you are currently enrolled in school, please indicate the highest degree you have received.)</label>
        <select id="degree" class="form-control form-control-sm">
          <option value=""></option>
          <option value="less than highschool">Less than a high school diploma</option>
          <option value="high school">High school degree or equivalent (e.g. GED)</option>
          <option value="some college">Some college, no degree</option>
          <option value="associate">Associate degree (e.g. AA, AS)</option>
          <option value="bachelor">Bachelor’s degree (e.g. BA, BS)</option>
          <option value="master">Master’s degree (e.g. MA, MS, MEd)</option>
          <option value="professional">Professional degree (e.g. MD, DDS, DVM)</option>
          <option value="doctoral">Doctorate (e.g. PhD, EdD)</option>
        </select>
      </div>
      <div class="form-group">
        <label for="major">If you are pursuing secondary education, What is your field of study?</label>
        <input id="major" type="text"/>
      </div>
      <div class="form-group">
        <label for="employment">What is your current employment status?</label>
        <select id="employment" class="form-control form-control-sm">
          <option value=""></option>
          <option value="fulltime">Employed full time (40 or more hours per week)</option>
          <option value="parttime">Employed part time (up to 39 hours per week)</option>
          <option value="looking">Unemployed and currently looking for work</option>
          <option value="notlooking">Unemployed and not currently looking for work</option>
          <option value="student">Student</option>
          <option value="military">Military</option>
          <option value="retired">Retired</option>
          <option value="homemaker">Homemaker</option>
          <option value="selfemployed">Self-employed</option>
          <option value="unable">Unable to work</option>
        </select>
      </div>
      <div class="form-group">
        <label for="income">What is your current household income?</label>
        <select id="income" class="form-control form-control-sm">
          <option value=""></option>
          <option value="<20">Less than $20,000</option>
          <option value="20-35">$20,000 to $34,999</option>
          <option value="35-50">$35,000 to $49,999</option>
          <option value="50-75">$50,000 to $74,999</option>
          <option value="75-100">$75,000 to $99,999</option>
          <option value=">100">Over $100,000</option>
        </select>
      </div>
    </form>
  </div>
</div>

@endsection

@section('javascript')
<script type="text/javascript" src="{{ asset('js/demographics.js') }}"></script>
@endsection
