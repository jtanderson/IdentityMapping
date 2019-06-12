var circleLayer = new Layer();//creates the circle layer
var min = 55;
var max = 135;
var minR = 125;
var maxR = 650;
for(var i=1; i<=5; i++){//loop for circle creation (random)
  var circle = new Path.Circle({
    center: [Math.floor(Math.random() * (+maxR - +minR)) + +minR, Math.floor(Math.random() * (+maxR - +minR)) + +minR],
    radius: Math.floor(Math.random() * (+max - +min)) + +min,
    fillColor: new Color(1, 1, 1, 0.75), //'white',
    strokeColor: 'black',
    id: i,
    insert: false,
    data: {
      circleId: i
    }
  });
  circleLayer.addChild(circle); //add each circle to the layer
}
circleLayer.data.layerName = "circles";
project.addLayer(circleLayer);//adds the layer

var intersectionLayer = new Layer();//starts the intersection layer
intersectionLayer.data.layerName = "intersections";
//loop for creating all the intersection objects
for(var i=1;i<6;i++){
  var c_i = project
    .getItem({data: {layerName: "circles"}})
    .getItem({data: {circleId: i}});
  for(var j=i+1;j<6;j++){
    var c_j = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: j}});

    var int_ij = c_i.intersect(c_j, {insert: false});
    int_ij.data.id = ""+i+j;
    intersectionLayer.addChild(int_ij);
    for(var k = j+1; k<6; ++k){
         var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
         var int_ijk = int_ij.intersect(c_k, {insert: false});
        int_ijk.data.id = ""+i+j+k;
        intersectionLayer.addChild(int_ijk); 
      for(var l=k+1; l<6; l++){
        var c_l = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: l}});
    var int_ijkl = int_ijk.intersect(c_l, {insert: false});
    int_ijkl.data.id = ""+i+j+k+l;
    intersectionLayer.addChild(int_ijkl);
      }
    }
  }
}//end intersections loop


 var c_m = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 5}});//5-tuple intersection
  var int_ijklm = int_ijkl.intersect(c_m, {insert: false});
  int_ijklm.data.id = ""+i+j+k+l+m;
  intersectionLayer.addChild(int_ijklm);

var textLayer = new Layer();//creates the text layer which will be the top layer
textLayer.data.layerName = "text";



for(var i=1; i<=5; i++){//loops the five text creation and binds to the circle objects position
  var c = project.getItem({data: {circleId: i}});
  var text = new PointText({
    fillColor:  'black',
    content:  "Circle " + i,
    position: c.position,
    insert: false,
    data: {
      textId: i
    }
  });

  textLayer.addChild(text);//adds text to the text layer
}
//function for fixing the layers
var fixLayers = function(){
  textLayer.sendToBack();
  intersectionLayer.sendToBack();
  circleLayer.sendToBack();
  console.log('Fixed layers...');
}

var activeItem; 
var handle;
var dragged = false; 

//function when user makes a click
function onMouseDown(event){
  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  // first assigns the test to hitResult
  // second, evaluates whether it was null or not
  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit
    activeItem = hitResult.item; // will be a intersection
  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit
    //activeItem = cLayer;//same as above need to set one item to active not entire layer
    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;
 
    //creates circles handle
    handle = activeItem.hitTest(event.point, 
      {
        segments: true,
        stroke: true,
        fill: true,
        tolerance: 5
      }
    );
  } else {
    console.log("Nothing hit");
    for(var i in iLayer.children){
      iLayer.children[i].selected = false; //??
    }
    for(var i in cLayer.children){
      cLayer.children[i].selected = false; //??
    }
  }
  fixLayers();
}//end of the mouse down function


var segment;

function onMouseDrag(event) {
  dragged = true;
  
  // @Grace, as soon as a drag starts, destroy all existing intersections
  // they will be re-created on the mouseUp event

  if ( activeItem){
    // terrible and dirty.
    if( activeItem.isIntersection == "true" ){
      return false;
    }
    //if we hit a handle, resize the circle
    if(handle && (handle.type == 'stroke' || handle.type == 'segment')){
      var p = event.point; // old
      var p2 = p + event.delta; // new
      var c = activeItem.position;
      if ((c - p).length > (c - p2).length){
        activeItem.scaling -= 0.005*event.delta.length;
      } else {
        activeItem.scaling += 0.005*event.delta.length;
      }
    }
    //else move the circle
    else {
      activeItem.translate(event.delta);// + activeItem.position);
    }

  } // end if(activeitem)
} // end onMouseDrag

function onMouseUp(event){

  console.log(activeItem);
  /*
   * activeItem is about to get removed!
   * need to remember which intersection it is, if any, and re-select it later
   * add an attribute, or use "isSelected" ?
   */

  //dragged = true;
  if (dragged) { 
    console.log("Calculating intersections...");
    for (var _int in intersections){
      // TODO: maybe remove if destruction happens in onMouseDrag
      intersections[_int].remove();
    }
    // @Grace, compare w/ code above, put into own function
    // iterate every 2, 3, 4-tuple and calculate intersection of all
    // need to add the 5-tuple after
    for(var i=1;i<6;i++){
      for(var j=i+1;j<6;j++){
        if( groupArray[j].visible ){ // TODO: bring back visibility testing
          intersections[""+i+j] = groupArray[i].children[0].intersect(groupArray[j].children[0]);
          // TODO: more of this
          intersections[""+i+j].data["intersectionId"] = "blah";
          for(var k=j+1;k<6;k++){
            intersections[""+i+j+k] = intersections[""+i+j].intersect(groupArray[k].children[0]);
            for(var l =k+1; l < 6; l++){
              intersections[""+i+j+k +l] = intersections[""+i+j + k].intersect(groupArray[l].children[0]);
            }
          }
        }
      }
    }
  }

  dragged = false; // reset
  console.log("Calling fixLayers...");
  fixLayers();
}

var scope = this;

/*
 * Called when "Add Circle" is clicked
 */
doSubmit = function(e){
  scope.activate();
  e.preventDefault();


  // the id of the circle we're changing
  var targetName = e.target.querySelector("[name=formId]").value.toLowerCase();
  // holds the user's text entry
  var text = e.target.getElementsByTagName("input")[0].value;

  console.log("Looking for circle " + targetName);

  var obj = project
  //.getItem({data: {layerName: "circles"}})
    .getItem({data: {circleId: parseInt(targetName)}});

  console.log(obj);
  var t = project.getItem({
    //_class: "PointText"
    data: {textId: parseInt(targetName)}
  });
  t.content = text;

  // TODO: instead of changing visibility, call "insert" if not already there
  obj.visible = true;
  return false;
} //end doSubmit function

window.doSubmit= doSubmit;

var sliderIntersect=document.getElementById("rangeIntersect");

sliderIntersect.addEventListener("change",function(){
  var r,b;
  r=Math.round(255*(100-sliderIntersect.value)/100);
  b=Math.round(255*sliderIntersect.value/100);

  // doesn't work for intersections because then activeItem doesn't have children
  if( !activeItem.isIntersection ){
    activeItem.children[0].fillColor = "rgb("+r+",0,"+b+")";
    if(activeItem.value == 0){ // TODO: you mean slider value here?
      activeItem.children[0].fillColor = "white";
    }
  } else {
    // activeItem is an intersection (i.e. some Path object)
    activeItem.fillColor = "rgb("+r+",0,"+b+")";
  }

},false);

var formIntersect1 = document.getElementById("inlineRadioIntersect1");
formIntersect1.addEventListener("change",function(){
  activeItem.dashArray = false;
},false);

var formIntersect12 = document.getElementById("inlineRadioIntersect12");
formIntersect12.addEventListener("change",function(){
  activeItem.dashArray = [10,4];
},false);


