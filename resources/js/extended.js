var debug_mode = false;

//instead of importing local storage, search db for sessid/userid, return circles

var activeItem; 
var handle;
var dragged = false; 
var intersect = false;

console.log("Before init");


var intialize = function(){
// function loadCircles(){

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
      var line_style = document.getElementById("circle-"+circleID+"-line_style").value;

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
      }


      var circ = new Path.Circle({
        center: [circle[i]['circle_x'], circle[i]['circle_y']],
        radius: circle[i]['radius'],
        fillColor: new Color(1, 1, 1, 0.75),
        strokeColor: 'black',
        // id: i,
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

console.log(" after init ");

//mouse down function
function onMouseDown(event){

  if(activeItem){
    activeItem.selected = false;
  }

  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  var form1 = document.getElementById("inlineRadioIntersect1");
  form1.checked = false;
  var form2 = document.getElementById("inlineRadioIntersect12");
  form2.checked = false;


  if(debug_mode){
    console.log("Radios Cleared");
  }


  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit

    activeItem = hitResult.item; // will be a intersection
    activeItem.selected = true;
    intersect = true;
    if(debug_mode){
      console.log("User clicked an intersection with id " + hitResult.item.data.id);
    }


  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit

    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;
    console.log(activeItem.fillColor);
    sliderIntersect = document.getElementById("rangeIntersect");
            //sliderIntersect.value = activeItem.fillcolor; 
            //sliderIntersect.value = activeItem.fillcolor; 
            // *******TODO: need to calculate the correct number******
            //set activeItem.fillColor = current_color;
            //sliderIntersect.addEventListener("change",function(){
            //TODO warming: this logic needs to be duplicated for intersections! make it a function, updateSlider(activeItem)
    
    var colorStr = activeItem.fillColor._canvasStyle;
    var test_r, test_b;
    test_r = colorStr.split("(")[1].split(",")[0];
    test_b = colorStr.split("(")[1].split(",")[2];

    console.log("I think circle " + activeItem.id + " colors are " + test_r + " and " + test_b);

    sliderIntersect.value = (1-test_r/255)*100;

    console.log("Circle " + activeItem.id+"'s color is " + "rgb(" + activeItem.fillColor.r + ",0,"+ b +")");
    
    //What is all of this?
    // var r2, b2;
    // r2 = (((sliderIntersect.value-100)*100)/255); //which theoretically is r
    // b2 = ((sliderIntersect.value*100)/255); //which theoretically is b
    // // 

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

//handles all color sliders as well as outlines
var sliderIntersect = document.getElementById("rangeIntersect");

//color circles 
sliderIntersect.addEventListener("change",function(){
  if( activeItem ){
    var r,b;
    r=Math.round(255*(100-sliderIntersect.value)/100);
    b=Math.round(255*sliderIntersect.value/100);
    activeItem.fillColor = "rgb("+r+",0,"+b+",0.9)";
    console.log("Circle " + activeItem.id +"'s color is " + "rgb("+r+",0,"+b+")");
  }
},true);

//change stroke value (dotted/solid)

//solid button 
var formIntersect1 = document.getElementById("inlineRadioIntersect1");

//if it is not dashed, it is solid (Isn't this default though?)
formIntersect1.addEventListener("change",function(){
  if(activeItem){
    
    //does this do anything? var line = activeItem.dashArray;
    if (activeItem.dashArray = false){

      console.log("Circle " + activeItem.id +"'s outline is solid");
    }
  }
},false);

//dashed button
var formIntersect12 = document.getElementById("inlineRadioIntersect12");

formIntersect12.addEventListener("change",function(){
  if(activeItem){

    //true or false, not specified values
    activeItem.dashArray = [10,4];
    console.log("Circle " + activeItem.id +"'s outline is dashed");
      }
},false);


doSubmit = function(e){

  console.log("doSumbit Coloring here");

  console.log("doSumbit Layering here");

  e.preventDefault();

    var circleID = event.target.id.split("-")[1];
    console.log(circleID);

    var circleLabel = document.getElementById("circle-"+circleID+"-label").value;
    console.log(circleLabel);

    var obj = project.getItem({data: {circleId: parseInt(circleID)}});

    // console.log(obj.position.x);
    // console.log(obj.position.y);
    // console.log(obj.bounds.width/2);


    var objLabel = project.getItem({data: {labelId: parseInt(circleID)}});
    objLabel.content = circleLabel;

    obj.visible = true;
    objLabel.visible = true;

      $.post("/saveCircleData", {
        "number": circleID,
        "position_x": obj.position.x,
        "position_y": obj.position.y,
        "label": circleLabel,
        "radius": (obj.bounds.width/2),
    })
    .done(function(data){
      console.log("Save complete!");
    });

    $.post("/saveIntersectData", {
          "created": "" /*time stamp here */,
          "updated": "" /*time stamp here */,
          "circle1": "" /*circle 1 id*/,
          "circle2": "" /*circle 2 id*/,
          "area": "" /*calculated in intersection function*/
    })
    .done(function(data){
      console.log("Save complete!");
    });


  insert = true;

  intersections();

  return false;
} //end doSubmit function

//G: Do we still need line below?
//window.doSubmit = doSubmit;