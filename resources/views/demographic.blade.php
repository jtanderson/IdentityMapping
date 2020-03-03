@extends('layouts.app')

@section('content')
<style>

    .container {
      position: relative; 
      max-width: 1200px; /* Maximum width */
      margin: 0 auto; /* Center it */
    }

  .canvas-container{margin: 0 auto;}
     #html, body{
      font-family: "Times New Roman", Times, serif;
      font-size: 20px;
    }
</style>
  <body>
<!-- 
<div class="progress">
  <div class="progress-bar" role="progressbar" aria-valuenow="60" aria-valuemin="0" aria-valuemax="100" style="width: 80%;">
    <span class="sr-only">60% Complete</span>
  </div>
</div>
 -->

<div class="container">
  <div class="row">
    <div class="col-sm">
     

      <h1>Demographics</h1>
    </head>
    <div class="text text-left">
    Please tell us aboiut yourself now so that we can compare you to people that are related to you in demographics. This will help in determining who you associate with and who you are likely to associate with in the future. After filling this out you will be prompted to the end of the survey where you can submit all of your work for final comparison and the assignment will be completed.<br><br>
  </div>
    <div class="row">
      <div class="col-sm-6">
        What gender do you associate yourself with?
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>Male</option>
          <option>Female</option>
          <option>Other</option>
        </select>


        <br> Which of these options describes your age?
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>18-24 years old</option>
          <option>25-34 years old</option>
          <option>35-44 years old</option>
          <option>45-54 years old</option>
          <option>55-64 years old</option>
          <option>65-74 years old</option>
          <option>Over 75 years old</option>

        </select>



        <br>Are you Hispanic, Latino or of Spanish origin?
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>Yes</option>
          <option>No</option>
        </select>

        <br>Ethnicity origin (or Race): Please specify your ethnicity.
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>White</option>
          <option>Hispanic or Latino</option>
          <option>Black or African American</option>
          <option>Native American or American Indian</option>
          <option>Asian/ Pacific Islander</option>
          <option>Other</option>
        </select>


        <br> What is your marital status?
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>Single (never married)</option>
          <option>Married or in a domestic partnership</option>
          <option>Widowed</option>
          <option>Divorced</option>
          <option>Separated</option>

        </select>

        <br>What is the highest degree or level of school you have completed? (If you are currently enrolled in school, please indicate the highest degree you have received.)
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>Less than a high school diploma</option>
          <option>High school degree or equivalent (e.g. GED)</option>
          <option>Some college, no degree</option>
          <option>Associate degree (e.g. AA, AS)</option>
          <option>Bachelor’s degree (e.g. BA, BS)</option>
          <option>Master’s degree (e.g. MA, MS, MEd)</option>
          <option>Professional degree (e.g. MD, DDS, DVM)</option>
          <option>Doctorate (e.g. PhD, EdD)</option>
          
        </select>

        <br>What is your current employment status?
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>Employed full time (40 or more hours per week)</option>
          <option>Employed part time (up to 39 hours per week)</option>
          <option>Unemployed and currently looking for work</option>
          <option>Unemployed and not currently looking for work</option>
          <option>Student</option>
          <option>Military</option>
          <option>Retired</option>
          <option>Homemaker</option>
          <option>Self-employed</option>
          <option>Unable to work</option>
          
        </select>

        <br> What is your current household income?
        <select class="form-control form-control-sm">
          <option>Select</option>
          <option>Less than $20,000</option>
          <option>$20,000 to $34,999</option>
          <option>$35,000 to $49,999</option>
          <option>$50,000 to $74,999</option>
          <option>$75,000 to $99,999</option>
          <option>Over $100,000</option>

        </select>
      </div></div></div></div></div>




    </div></div></div>


    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
  </body>
  <script>
    function submit(){
      var a = document.getElementsByTagName("select");
      for(var i in a){
        console.log(a[i].value);
      }
    }
  </script>
@endsection