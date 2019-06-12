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
    visible: false,
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
intersections();
var textLayer = new Layer();//creates the text layer which will be the top layer
textLayer.data.layerName = "text";



for(var i=1; i<=5; i++){//loops the five text creation and binds to the circle objects position
  var c = project.getItem({data: {circleId: i}});
  var text = new PointText({
    fillColor:  'black',
    content:  "Circle " + i,
    position: c.position,
    insert: false,
    visible: false,
    data: {
      textId: i
    }
  });

  textLayer.addChild(text);//adds text to the text layer
}

//function for creating intersections
function intersections(){
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
    int_ijklm.data.id = ""+i+j+k+l+5;
    intersectionLayer.addChild(int_ijklm);
}//end intersections function

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
var tester = false;
//function when user makes a click
function onMouseDown(event){
  if(activeItem){
    activeItem.selected = false;
   //need something else here maybe
  }
  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  // first assigns the test to hitResult
  // second, evaluates whether it was null or not
  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit
    activeItem = hitResult.item; // will be a intersection
    activeItem.selected = true;
  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit
    //activeItem = cLayer;//same as above need to set one item to active not entire layer
    activeItem = hitResult.item; // will be a circle
    tester = true;
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
    activeItem = null;
    for(var i in iLayer.children){
      iLayer.children[i].selected = false; 
    }
    for(var i in cLayer.children){
      cLayer.children[i].selected = false; 
    }
  }
  fixLayers();
}//end of the mouse down function

var segment;
//when user clicks and drags
function onMouseDrag(event){//needs a boolean value for what is clicked and dragged
  dragged = true;//not sure if we still need this yet
  //TODO: need to destroy old intersections here before we test and make any changes
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  if(tester){//if it is a circle being hit
    for(var i in iLayer.children){
      iLayer.children[i].remove(); 
    }
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
      var data = activeItem.data.circleId;
      activeItem.translate(event.delta);
      project.getItem({data: {textId: data}}).translate(event.delta);
      // + activeItem.position);
    }
  } else{
    return false;
  }
}//end mouse dragging function

//on mouse up function
function onMouseUp(event){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var visibility = true;
  for(var j in cLayer.children){
    if(cLayer.children[j].visible == false){
      visibility = false;
    }
  }  
  if(visibility == true){
      intersections();

  }

  //need to de select active item
  //TODO: recalculate all intersections
  if(dragged){//if the user dragged the circle
    //remove all old intersections
    for(var i in iLayer.children){
      iLayer.children[i].remove(); 
    }
    //create new intersections here
    //calculate new intersections by calling graces function
  }
  dragged = false;
  fixLayers();
}//end mouse up function

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
  localStorage[targetName] = text;
  console.log("Looking for circle " + targetName);

  var obj = project
  //.getItem({data: {layerName: "circles"}})
    .getItem({data: {circleId: parseInt(targetName)}});
    var objText = project
    //.getItem({data: {layerName: "circles"}})
      .getItem({data: {textId: parseInt(targetName)}});
  obj.visible = true;
  objText.visible = true;
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
//handles all color sliders as well as outlines
var sliderIntersect=document.getElementById("rangeIntersect");
sliderIntersect.addEventListener("change",function(){
  var r,b;
  r=Math.round(255*(100-sliderIntersect.value)/100);
  b=Math.round(255*sliderIntersect.value/100);
  var cLayer = project.getItem({data: {layerName: "circles"}});
  if(hitResult = cLayer.hitTest(event.point)){
    activeItem = hitResult.item; // will be a circle
        activeItem.children[0].fillColor = "rgb("+r+",0,"+b+")";
    if(activeItem.value == 0){ // TODO: you mean slider value here?
      activeItem.children[0].fillColor = "white";
    }
  }
    activeItem.fillColor = "rgb("+r+",0,"+b+")";
},false);
var formIntersect1 = document.getElementById("inlineRadioIntersect1");
formIntersect1.addEventListener("change",function(){
  activeItem.dashArray = false;
},false);
var formIntersect12 = document.getElementById("inlineRadioIntersect12");
formIntersect12.addEventListener("change",function(){
  activeItem.dashArray = [10,4];
},false);