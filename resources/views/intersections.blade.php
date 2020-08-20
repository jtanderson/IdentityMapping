  @extends('layouts.main')

  @section('content')
  <div class="container">
    <h1>
        Tell Us About Your Intersections
    </h1>

    <br>   
  <form>
    <div class="form-group">
        <label for="exampleFormControlTextarea1">What do your intersections mean?</label>
        <textarea class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
    </div>

      @foreach ($intersection2 as $int2)

      <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + $int2->circle1_id + $int2->circle2_id + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

      @foreach ($intersection3 as $int3)

        <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + $int3->circle1_id + $int3->circle2_id + $int3->circle3_id + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

      @foreach ($intersection4 as $int4)

        <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + $int4->circle1_id + $int4->circle2_id + $int3->circle3_id + $int4->circle4_id + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

      @foreach ($intersection5 as $int5)

        <div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the" + $int5->circle1_id + $int5->circle2_id + $int5->circle3_id + $int5->circle4_id + $int5->circle5_id + "intersection (emotional, behavioral, time spent)." </label><textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>

      @endforeach

  <!-- <script>
               var prefix = "<div class='form-group'> <label for='exampleFormControlTextarea1'>Please describe the overall nature of the ";
                  var suffix = " intersection (emotional, behavioral, time spent).</label> <textarea class='form-control' id='exampleFormControlTextarea1' rows='3'></textarea></div>"

  var projObj = JSON.parse(localStorage["proj"]);
  for(var i = 0; i < 26; i++){
    if(projObj[1][1].children[i][1].closed){
        if(projObj[1][1].children[i][1].data["id"].length == 2){//intersections of length 2
    		var output = [];
  		for(var j = 0; j < 2; j++){
                output.push(+projObj[1][1].children[i][1].data["id"].charAt(j));
            }
            console.log(projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content);
            document.write(prefix + projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + suffix);
        }//end two way intersections
    	 if(projObj[1][1].children[i][1].data["id"].length == 3){//intersections of length 3
    		var output = [];
  		for(var j = 0; j < 3; j++){
                output.push(+projObj[1][1].children[i][1].data["id"].charAt(j));
            }
            console.log(projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + " : " + projObj[2][1].children[output[2]-1][1].content);
            document.write(prefix + projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + " : " + projObj[2][1].children[output[2]-1][1].content + suffix);
        }//end 3 way intersections 
  if(projObj[1][1].children[i][1].data["id"].length == 4){//intersections of length 4
    		var output = [];
  		for(var j = 0; j < 4; j++){
                output.push(+projObj[1][1].children[i][1].data["id"].charAt(j));
            }
            console.log(projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + " : " + projObj[2][1].children[output[2]-1][1].content  + " : " + projObj[2][1].children[output[3]-1][1].content);
            var copy = projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + " : " + projObj[2][1].children[output[2]-1][1].content  + " : " + projObj[2][1].children[output[3]-1][1].content;
            document.write(prefix + projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + " : " + projObj[2][1].children[output[2]-1][1].content  + " : " + projObj[2][1].children[output[3]-1][1].content + suffix);
          }//end 4 way intersections
            if(projObj[1][1].children[i][1].data["id"].length == 5){//intersection of length 5
    		var output = [];
  		for(var j = 0; j < 5; j++){
                output.push(+projObj[1][1].children[i][1].data["id"].charAt(j));
            }
            console.log(copy);
            console.log(projObj[2][1].children[output[0]-1][1].content + " : " + projObj[2][1].children[output[1]-1][1].content + " : " + projObj[2][1].children[output[2]-1][1].content  + " : " + projObj[2][1].children[output[3]-1][1].content);
            document.write(prefix + "all five identities " + suffix);
          }//end 5 way intersection
       }
     }
      console.log(localStorage);
      var num = parseInt(localStorage["numIntersections"]) -1;
      </script> -->
  </form>
     </div>
  @endsection


