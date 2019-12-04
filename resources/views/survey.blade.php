@extends('layouts.app')

@section('content')
<div class="container">
        <h1> Description</h1>
        <div class="row">
          <div class="col-sm">
  <div class="text text-right">
    <a href="finished.html" class="btn btn-danger">Abort</a>
  </div>
  Now that your map is complete, we are going to ask you some questions about those five identities. <b>Please respond to the following questions thinking about each identity one at a time.</b><br>
  <div class="container">
    <div class="row">
      <div class="col-sm">
        <br>
    <script>
      survey("Rate how strongly held each social identity is when you think about yourself.", "Strongly held", "Weakly held");
      survey("Rate how important each social identity is to the way you think about yourself.", "Not very important", "Extremely important");
      survey("Indicate the extent to which something that happens in your life is affected by what happens to other people who share that social identity.", "Very close", "Not close");
      </script>

      </div>
      <div class="col-sm">
<br>
        <script>
          survey("Rate the distance you believe each social identity is from defining who you are.", "Strongly held", "Weakly held");
          survey("How often do you think about having each social identity and what you have in common with others who share that identity?", "Hardly ever", "A lot");
          survey("How proud do you feel when someone who shares your social identity accomplishes something outstanding?", "Not at all", "A great deal");
          </script>
      </div>
    </div>
  </div>
          </div>
        </div></div></div>
     

@endsection

@section('javascript')
<script>
      function survey(question, prefix, suffix){
                  document.write(question + "<br>");
        for(var i = 1; i < 6; ++i){
          if(localStorage[i] != undefined){
              document.write("<b>" + localStorage[i] + "</b><br><emsp><emsp>");
              document.write("<form>" + prefix + " <emsp>");
              for(var j = 0; j < 7; j++){
                  document.write("<label class='radio-inline'><input type='radio' name='optradio' value=j>&emsp;</label>");
               }
              document.write(" <emsp>" + suffix + "<br></form>");
            }
           
        }
        document.write("<br>");
      }
    </script>
<script type="text/javascript">
      function doSubmit(){
        console.log('here');
        var a = document.getElementsByTagName("input");
        for(var i in a){
          if(a[i].checked)
            console.log(a[i].value);
        }
        return false;
      }
    </script>
@endsection