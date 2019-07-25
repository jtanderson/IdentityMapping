var debug_mode = false;

var activeItem; 
var handle;
var dragged = false; 

// TODO: logic around this is wrong, it never gets reset
var tester = true;

var intersect = false;
//function when user makes a click

//mouse down function
function onMouseDown(event){

  if(activeItem){
    activeItem.selected = false;
    //need something else here maybe, is this where tester comes in--tester is if clicked, and if clicked, item = activeItem?
  }

  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  // first assigns the test to hitResult
  // second, evaluates whether it was null or not
  // TODO: do not test visible items!!!!
  //this is where we need to deselect radio buttons i believe

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
    //fixLayers();

    if(debug_mode){
      console.log("User clicked an intersection with id " + hitResult.item.data.id);
    }


  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit

    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;
    tester = true; //this is if clicked??

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
    activeItem.fillColor = "rgb("+r+",0,"+b+")";
  }
},false);
var formIntersect1 = document.getElementById("inlineRadioIntersect1");

formIntersect1.addEventListener("change",function(){
  if(activeItem){
    activeItem.dashArray = false;
  }
},false);
var formIntersect12 = document.getElementById("inlineRadioIntersect12");
formIntersect12.addEventListener("change",function(){
  if(activeItem){
    activeItem.dashArray = [10,4];
  }
},false);
