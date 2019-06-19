var editor = false;
var circleLayer = new Layer();//creates the circle layer
var min = 55;
var max = 135;
var minR = 125;
var maxR = 650;
for(var i=1; i<=5; i++){//loop for circle creation (random)
  var circle = new Path.Circle({
    center: [Math.floor(Math.random() * (+maxR - +minR)) + +minR, Math.floor(Math.random() * (+maxR - +minR)) + +minR],
    radius: Math.floor(Math.random() * (+max - +min)) + +min,
    fillColor: new Color(1, 1, 1, 0.75), //took out opacity to test intersections
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
    if( c_i.visible ){
      for(var j=i+1;j<6;j++){
        var c_j = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: j}});
        if( c_j.visible ){
          var int_ij = c_i.intersect(c_j, {insert: false});
          int_ij.data.id = ""+i+j;
          //int_ij.fillColor = new Color(1,0,0);
          intersectionLayer.addChild(int_ij); //2
          for(var k=j+1;k<6;k++){
            var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
            if( c_k.visible ){
              var int_ijk = int_ij.intersect(c_k, {insert: false});
              //int_ijk.fillColor = new Color(0,1,0);
              int_ijk.data.id = ""+i+j+k;
              intersectionLayer.addChild(int_ijk); //3
              for(var l = k+1;l<6; l++){
                var c_l = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: l}});
                if( c_l.visible ){
                  var int_ijkl = int_ijk.intersect(c_l, {insert: false});
                  //int_ijkl.fillColor = new Color(0,0,1);
                  int_ijkl.data.id = ""+i+j+k+l;
                  intersectionLayer.addChild(int_ijkl);//4
                } // c_l visible
              } // l loop
            } // c_k visible
          } // k loop
        } // c_j visible
      } // j loop
    } // c_i visible
  } // i loop

  var c_m = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 5}});//5-tuple intersection
  if( c_m.visible ){
    var int_ijklm = intersectionLayer.getItem({data: {id: "1234"}}).intersect(c_m, {insert: false});
    if( int_ijklm ){
      int_ijklm.data.id = ""+i+j+k+l+"5";
      //int_ijklm.fillColor = new Color(1,1,0);
      intersectionLayer.addChild(int_ijklm);
    }
  }
}//end intersections function

//function for fixing the layers
var fixLayers = function(){
  // do the intersections
  // TODO: fix, doesn't seem to work sometimes
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  for(var i = 2; i<6; i++){
    for(var j=0; j<iLayer.children.length; j++){
      if( iLayer.children[j].data.id.length == i ){
        iLayer.children[j].bringToFront();
      }
    }
  }
  
  // TODO: get fresh
  textLayer.sendToBack();
  iLayer.sendToBack();
  circleLayer.sendToBack();
  if(editor){
  console.log('Fixed layers...');
  }
}//end fix layers function

var activeItem; 
var handle;
var dragged = false; 
var tester = false;
var intersect = false;
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
  // TODO: do not test visible items!!!!
  //this is where we need to deselect radio buttons i believe

var form1 = document.getElementById("inlineRadioIntersect1");
form1.checked = false;
var form2 = document.getElementById("inlineRadioIntersect12");
form2.checked = false;

  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit
    activeItem = hitResult.item; // will be a intersection
    activeItem.selected = true;
    intersect = true;
  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit
    activeItem = hitResult.item; // will be a circle
    tester = true;
    activeItem.selected = true;
    
    //creates circles handle
    handle = activeItem.hitTest(event.point, 
      {
        segments: true,
        stroke: true,
        fill: true,
        tolerance: 15
      }
    );
  } else {
    if(editor){
    console.log("Nothing hit");
    }
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
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  if(tester && !intersect){//if it is a circle being hit
    iLayer.removeChildren();//destroying old intersections
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
      if(activeItem){
      activeItem.translate(event.delta);
      project.getItem({data: {textId: data}}).translate(event.delta);
      // + activeItem.position);
      }
    }

  }

  intersections();
  fixLayers();
}//end mouse dragging function

//on mouse up function
function onMouseUp(event){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  intersect = false;
  intersections();

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
  if(editor){
  console.log("Looking for circle " + targetName);
  }
  var obj = project
  //.getItem({data: {layerName: "circles"}})
    .getItem({data: {circleId: parseInt(targetName)}});
  var objText = project
  //.getItem({data: {layerName: "circles"}})
    .getItem({data: {textId: parseInt(targetName)}});
  obj.visible = true;
  objText.visible = true;
  if(editor){
  console.log(obj);
  }
  var t = project.getItem({
    //_class: "PointText"
    data: {textId: parseInt(targetName)}
  });
  t.content = text;

  // TODO: instead of changing visibility, call "insert" if not already there
  obj.visible = true;
  intersections();
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
