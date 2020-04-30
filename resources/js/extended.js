var debug_mode = false;
project.importJSON(localStorage["saved"]);
var activeItem; 
var handle;
var dragged = false; 

var tester = true;

var intersect = false;
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
    tester = true; 
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
    //console.log("Circle " + activeItem.id+"'s color is " + "rgb(" + activeItem.fillColor.r + ",0,"+ b +")");
    var r2, b2;
    r2 = (((sliderIntersect.value-100)*100)/255); //which theoretically is r
    b2 = ((sliderIntersect.value*100)/255); //which theoretically is b
    // sliderIntersect.value = 

    if(debug_mode){
      console.log("User clicked circle: " + hitResult.item.data.circleId);
    }

    //creates circles handle
    handle = activeItem.hitTest(event.point, 
      {
        segments: true,
        stroke: true,
        fill: true,
        tolerance: 15
      }
    );
  } else { //when nothing is hit
    if(debug_mode){
      console.log("Nothing hit");
    }
    if( activeItem ){
      activeItem.selected = false;
    }
    activeItem = null;
  }
}//end of the mouse down function

var segment;
var scope = this;

//handles all color sliders as well as outlines
var sliderIntersect=document.getElementById("rangeIntersect");

sliderIntersect.addEventListener("change",function(){
  if( activeItem ){
    var r,b;
    r=Math.round(255*(100-sliderIntersect.value)/100);
    b=Math.round(255*sliderIntersect.value/100);
    activeItem.fillColor = "rgb("+r+",0,"+b+",0.9)";
    console.log("Circle " + activeItem.id +"'s color is " + "rgb("+r+",0,"+b+")");
  }
},true);

var formIntersect1 = document.getElementById("inlineRadioIntersect1");

formIntersect1.addEventListener("change",function(){
  if(activeItem){
    var line = activeItem.dashArray;
    if (activeItem.dashArray = false){

      console.log("Circle " + activeItem.id +"'s outline is solid");
    }
  }
},false);

var formIntersect12 = document.getElementById("inlineRadioIntersect12");

formIntersect12.addEventListener("change",function(){
  if(activeItem){
    activeItem.dashArray = [10,4];
    console.log("Circle " + activeItem.id +"'s outline is dashed");
      }
},false);


doSubmit = function(e){

  console.log("doSumbit Coloring here");

  //scope.activate();
  e.preventDefault();

 //what is the difference between t, text, and objText

  var circleID = e.target.querySelector("[name=formId]").value;

  //get array of elements, [0]th element's value
  var circleText = e.target.querySelector("[name=circleText]").value;

  //actual circle obj itself - with ID that we need 
  var obj = project.getItem({data: {circleId: parseInt(circleID)}});

  var objText = project.getItem({data: {textId: parseInt(circleID)}});

    obj.visible = true;
    objText.visible = true;

  $.post("/saveCircleData", {
    
    //change circle1 to auto increment id (??)
    "circle1": {

      "color": obj.fillColor,
      "line_style": line,
    }
  })
  .done(function(data){
    console.log("Save complete!");
  });

  insert = true;

  intersections();

  return false;
} //end doSubmit function

//submits json
window.doSubmit = doSubmit;

