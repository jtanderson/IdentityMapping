@extends('layouts.main')

@section('content')

<div class="row">
  <h1>
    Categorize Your Identities
  </h1>
  <div class="col-sm-2">
    
      <div class="form-group">
      <script>
        document.write("<label for='exampleFormControlSelect1'>");
        if(localStorage[1] != undefined){
         document.write(localStorage[1]);
         document.write(" </label><select class='form-control' id='exampleFormControlSelect1'><option>Activity</option> <option>Family</option><option>Music</option><option>Occupation</option><option>Relationship</option><option>Religion</option></select>");
       }
     </script>
     
   </div>

 </div>
 <div class="col-sm-2">
  

  <div class="form-group">
    <script>
      document.write("<label for='exampleFormControlSelect1'>");
      if(localStorage[2] != undefined){
       document.write(localStorage[2]);
       document.write(" </label><select class='form-control' id='exampleFormControlSelect1'><option>Activity</option> <option>Family</option><option>Music</option><option>Occupation</option><option>Relationship</option><option>Religion</option></select>");
     }
   </script>
 </div>
</div>
<div class="col-sm-2">
  <div class="form-group">
    <script>
      document.write("<label for='exampleFormControlSelect1'>");
      if(localStorage[3] != undefined){
       document.write(localStorage[3]);
       document.write(" </label><select class='form-control' id='exampleFormControlSelect1'><option>Activity</option> <option>Family</option><option>Music</option><option>Occupation</option><option>Relationship</option><option>Religion</option></select>");
     }
   </script>
 </div>
</div>
<div class="col-sm-2">
  <div class="form-group">
    <script>
      document.write("<label for='exampleFormControlSelect1'>");
      if(localStorage[4] != undefined){
       document.write(localStorage[4]);
       document.write(" </label><select class='form-control' id='exampleFormControlSelect1'><option>Activity</option> <option>Family</option><option>Music</option><option>Occupation</option><option>Relationship</option><option>Religion</option></select>");
     }
   </script>
 </div>
</div>
<div class="col-sm-2">
  <div class="form-group">
    <script>
      document.write("<label for='exampleFormControlSelect1'>");
      if(localStorage[5] != undefined){
       document.write(localStorage[5]);
       document.write(" </label><select class='form-control' id='exampleFormControlSelect1'><option>Activity</option> <option>Family</option><option>Music</option><option>Occupation</option><option>Relationship</option><option>Religion</option></select>");
     }
   </script>
 </div>
</div>
</div>

</div>

@endsection

@section('javascript')
<script>
  function submit(){
    var a = document.getElementsByTagName("select");
    for(var i in a){
      console.log(a[i].value);
    }
  }
</script>
@endsection