$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var debug_mode = false;

var activeItem; 
var handle;
var dragged = false; 
var intersect = false;

var circleLayer = new Layer();//creates the circle layer
circleLayer.data.layerName = "circles";
project.addLayer(circleLayer);//adds the layer

var intersectionLayer = new Layer();//starts the intersection layer
intersectionLayer.data.layerName = "intersections";
project.addLayer(intersectionLayer); //adds int layer

//creates the label layer which will be the top layer
var labelLayer = new Layer();
labelLayer.data.layerName = "labels";
project.addLayer(labelLayer);

// console.log("Before init");

//only needs to recreate circles on page
var intialize = function(){
  var circle = Array(5);

   for(var i=1; i<=5; i++){

      var circleID = i;

      circle[i] = Array();

      // var form = document.getElementById("circle-" + i);
      var circle_x = document.getElementById("circle-"+circleID+"-center-x").value;
      // console.log("circle "+i+" x retrieved is " + circle_x);
      var circle_y = document.getElementById("circle-"+circleID+"-center-y").value;
      // console.log("circle "+i+" y retrieved is " + circle_y);
      var radius = document.getElementById("circle-"+circleID+"-radius").value;
      // console.log("circle "+i+" radius retrieved is " + radius);
      var line_style = document.getElementById("circle-"+circleID+"-line_style").value.split(",");

      var dbid = document.getElementById("circle-"+circleID+"-id").value;
      
      var label = document.getElementById("circle-"+circleID+"-label").value;
      //add information to circle[i].circle_x = circle_x
     
       //should return "" if no circle

      circle[i]['circle_x'] = circle_x;
      // console.log(circle[i]['circle_x']);
      circle[i]['circle_y']  = circle_x;
      circle[i]['radius'] = radius;
      circle[i]['label'] = label;
      circle[i]['dbid'] = dbid;
      circle[i]['line_style'] = line_style;


      var min = 55;
      var max = 135;
      var minR = 125;
      var maxR = 650;

      var exists = true;

      if(circle[i]['dbid'] == ""){

        exists = false;
        console.log("I think, therefore I don't exist");
        circle[i]['label'] = "Circle " + i;
        circle[i]['circle_x'] = Math.floor(Math.random() * (+maxR - +minR)) + +minR;
        circle[i]['circle_y'] = Math.floor(Math.random() * (+maxR - +minR)) + +minR;
        circle[i]['radius'] = Math.floor(Math.random() * (+max - +min)) + +min;
        circle[i]['line_style'] = [];
      }


      var circ = new Path.Circle({
        center: [circle[i]['circle_x'], circle[i]['circle_y']],
        radius: circle[i]['radius'],
        fillColor: new Color(1, 1, 1, 0.75),
        strokeColor: 'black',
        dashArray: circle[i]['line_style'],
        insert: exists,
        visible: exists,
        data: {
          circleId: i
        }
      });

      var iLayer = project.getItem({data:{layerName: "intersections"}});
      var cLayer = project.getItem({data:{layerName: "circles"}});
      var tLayer = project.getItem({data:{layerName: "labels"}});

      // console.log(circle);
      cLayer.addChild(circ); //add each circle to the layer WITHOUT visibility
      //avoid global handles

      // var c = project.getItem({data: {circleId: i}});

      // console.log(circ.center);

      var label = new PointText({
        fillColor:  'black',
        content: circle[i]['label'],
        position: circ.position,
        insert: exists,
        visible: exists,
        data: {
          labelId: i
        }
      });

      tLayer.addChild(label);//adds text to the text layer
  
  }//end for
}

intialize();

//mouse down function
paper.tool.onMouseDown = function(event){

  if(activeItem){
    activeItem.selected = false;
  }

  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  //get the solid button
  var solidBtn = document.getElementById("inlineRadioIntersect1");
  solidBtn.checked = false;

  //get the dashed button
  var dashedBtn = document.getElementById("inlineRadioIntersect12");
  dashedBtn.checked = false;

  if(debug_mode){
    console.log("Radios Cleared");
  }

  //hit testing

  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit

    activeItem = hitResult.item; // will be a intersection
    activeItem.selected = true;
    intersect = true;
    if(debug_mode){
      console.log("User clicked an intersection with id " + hitResult.item.data.id);
    }

    //saving the new colors on that intersection

  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit

    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;

    console.log(activeItem.fillColor);

    //retrieves color slider
    colorSlider = document.getElementById("rangeIntersect");

      //should be tied to eventlistener for sliderIntersect (horrible name)

      //retrieves color
      var colorStr = activeItem.fillColor._canvasStyle;
      var test_r, test_b;
      //retrieves r and b
      test_r = colorStr.split("(")[1].split(",")[0];
      test_b = colorStr.split("(")[1].split(",")[2];

      console.log("I think circle " + activeItem.id + " colors are " + test_r + " and " + test_b);

      //sets sliderIntersect value (slider's position) to that "color" on its range
      colorSlider.value = (1-test_r/255)*100;
      //(7/20) calls change event 

      //**occurs in event listener
      //fill selected circle with that color
      //set activeItem.fillColor = current_color;

    if(debug_mode){
      console.log("User clicked circle: " + hitResult.item.data.circleId);
    }

    //creates circles handle
    handle = activeItem.hitTest(event.point, 
      {
        segments: true,
        stroke: true,
        fill: true,
        tolerance: 30
      }
    );
  } else { //when nothing is hit

      if(debug_mode){
        console.log("Nothing hit");
      }

      //turn activeItem from true -> false
      if( activeItem ){
        activeItem.selected = false;
      }
      activeItem = null;

  }


}//end of the mouse down function

var segment;
var scope = this;

//since all of these are event listeners, should saveData() be on each of these? YES (X)

  //handles color slider
    var colorSlider = document.getElementById("rangeIntersect");

    //color circles 
    colorSlider.addEventListener("change",function(){
        if( activeItem ){
          var r,b;
          r=Math.round(255*(100-colorSlider.value)/100);
          b=Math.round(255*colorSlider.value/100);
          activeItem.fillColor = "rgb("+r+",0,"+b+",0.9)";
          console.log("Circle " + activeItem.id +"'s color is " + "rgb("+r+",0,"+b+")");

          var circleID = activeItem.data.circleId;
          // console.log("calculated circle id");
          console.log(circleID);
          //(7/20) recursion error happening here
          console.log("recursion @ colorslide?");
          saveCircle(circleID);
        }
    },true);

  //change stroke value (dotted/solid)

    //solid button 
    var solidBtn = document.getElementById("inlineRadioIntersect1");

    solidBtn.addEventListener("change",function(){
      if(activeItem){

        var circleID = activeItem.data.circleId;
        console.log("calculated circle id");
        console.log(circleID);
        
        if (activeItem.dashArray.length == 0){//if line style is empty

          console.log("Circle " + activeItem.id +"'s outline is solid");
          saveCircle(circleID);
        }
      }
    },false);

    //dashed button
    var dashedBtn = document.getElementById("inlineRadioIntersect12");

    dashedBtn.addEventListener("change",function(){
      if(activeItem){

        var circleID = activeItem.data.circleId;
        console.log("calculated circle id");
        console.log(circleID);

        //true or false, not specified values
        activeItem.dashArray = [10,4];
        console.log("Circle " + activeItem.id +"'s outline is dashed");

        saveCircle(circleID);

      }
    },false);


// }


//sends the circle data to DB storage
saveCircle = function(circleID){

  var circleLabel = document.getElementById("circle-"+circleID+"-label").value;
  console.log("recursion saveCircle?");

  var obj = project.getItem({data: {circleId: parseInt(circleID)}});

  var objLabel = project.getItem({data: {labelId: parseInt(circleID)}});
  objLabel.content = circleLabel;

  obj.visible = true;
  objLabel.visible = true;

  var problem = {
      "number": circleID,
      "position_x": obj.position.x,
      "position_y": obj.position.y,
      "label": circleLabel,
      "radius": (obj.bounds.width/2),
      "line_style": obj.dashArray.toString(), //returns either empty string or "10,4"
      "color": obj.fillColor.getComponents().toString(), //this is a string from the color OBJ
      //ex) "rgba(38,0,217,0.9)"  
  };

  console.log(obj);
  console.log(obj.fillColor);
  console.log(obj.fillColor.canvasStyle);

  console.log(problem);
 
  $.post("/saveCircleData", problem).done(function(data){
    console.log("Save complete!");
  });

}

doSubmit = function(e){

  e.preventDefault();

    var circleID = event.target.id.split("-")[1];
    console.log(circleID);

    saveCircle(circleID);

  intersections();

  return false;
} //end doSubmit function
