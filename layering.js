var debug_mode = false;
var circleLayer = new Layer();//creates the circle layer
var min = 55;
var max = 135;
var minR = 125;
var maxR = 650;
for(var i=1; i<=5; i++){//loop for circle creation (random)
  var circle = new Path.Circle({
    center: [Math.floor(Math.random() * (+maxR - +minR)) + +minR, Math.floor(Math.random() * (+maxR - +minR)) + +minR],
    radius: Math.floor(Math.random() * (+max - +min)) + +min,
    fillColor: new Color(1, 1, 1, 0.75),
    strokeColor: 'black',
    id: i,
    insert: false,
    visible: false,
    data: {
      circleId: i
    }
  });
  circleLayer.addChild(circle); //add each circle to the layer WITHOUT visibility
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
  var iLayer = project.getItem({data:{layerName: "intersections"}});

  iLayer.removeChildren();//destroying old intersections

 // console.log("iLayer.children.length before insert: " + iLayer.children.length);
  for(var i=1;i<6;i++){
    var c_i = project
      .getItem({data: {layerName: "circles"}})
      .getItem({data: {circleId: i}});
    if( c_i.visible ){
      for(var j=i+1;j<6;j++){
        var c_j = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: j}});
        //ij is two-uple intersections for circles i and j 
        if( c_j.visible ){ //if two circles overlap, then create intersection
          var int_ij = c_i.intersect(c_j, {insert: false});
          int_ij.selected = false;
          int_ij.data.id = ""+i+j;
          //int_ij.fillColor = new Color(1,0,0);
          intersectionLayer.addChild(int_ij); //2
          for(var k=j+1;k<6;k++){
            var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
            if( c_k.visible ){//if three circles overlap, then create intersection
              var int_ijk = int_ij.intersect(c_k, {insert: false});
              int_ijk.selected = false;
              //int_ijk.fillColor = new Color(0,1,0);
              int_ijk.data.id = ""+i+j+k;
              intersectionLayer.addChild(int_ijk); //3
              for(var l = k+1;l<6; l++){
                var c_l = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: l}});
                if( c_l.visible ){ //if four circles overlap, then create intersection
                  var int_ijkl = int_ijk.intersect(c_l, {insert: false});
                  int_ijkl.selected = false;
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
  //console.log("iLayer.children.length after insert: " + iLayer.children.length);

  /*var c_m = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 5}});//5-tuple intersection
  if( c_m.visible ){
    var int_ijklm = intersectionLayer.getItem({data: {id: "1234"}}).intersect(c_m, {insert: false});
    if( int_ijklm ){
      int_ijklm.data.id = ""+i+j+k+l+"5";
      //int_ijklm.fillColor = new Color(1,1,0);
      intersectionLayer.addChild(int_ijklm);
    }
  }*/
}//end intersections function

var intLayers = function(){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  for(var i = 2; i<6; i++){
    //console.log(i + "-way intersections:");
    for(var j=0; j<iLayer.children.length; j++){
      if( iLayer.children[j].data.id.length == i ){
        //console.log(iLayer.children[j].data.id);
        if(true){ // TODO: put back to debug_mode
          //console.log("Bringing intersection " + iLayer.children[j].data.id + " to the front");
        }
        iLayer.children[j].bringToFront();
      }
    }
  }

}

//function for fixing the layers
var fixLayers = function(){
  // do the intersections

  /***** Is this why the intersections fall beneath the circles?*****

  Intersections are pulled forward correctly, but colors are being pushed behind as well as other intersection layers

  */
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var tLayer = project.getItem({data: {layerName: "text"}});

  intLayers();

  tLayer.sendToBack();
  iLayer.sendToBack();
  cLayer.sendToBack();

  if(debug_mode){
    console.log('Fixed layers...');
  }

}//end fix layers function

//recreate when canvas reset function
var recreate = function(){
  for(var i=1; i<=5; i++){//loop for circle creation (random)
    var circle = new Path.Circle({
      center: [Math.floor(Math.random() * (+maxR - +minR)) + +minR, Math.floor(Math.random() * (+maxR - +minR)) + +minR],
      radius: Math.floor(Math.random() * (+max - +min)) + +min,
      fillColor: new Color(1, 1, 1, 0.75),
      strokeColor: 'black',
      id: i,
      insert: false,
      visible: false,
      data: {
        circleId: i
      }
    });
    circleLayer.addChild(circle); //add each circle to the layer WITHOUT visibility
  }
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
}

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

    //fixLayers();

  } else { //when nothing is hit

    if(debug_mode){
      console.log("Nothing hit");
    }

    if( activeItem ){
      activeItem.selected = false;
    }
    activeItem = null;

    /*
    for(var i in iLayer.children){
      iLayer.children[i].selected = false; 
    }
    for(var i in cLayer.children){
      cLayer.children[i].selected = false; 
    }
    */

    //fixLayers();
  }
  //fixLayers();
}//end of the mouse down function

var segment;

//when user clicks, holds down, and drags
function onMouseDrag(event){

if(activeItem == null){

	return;

}else{

  dragged=true;

  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  // user is scaling
  if(tester && !intersect){//if it is a circle boundary being hit
    iLayer.removeChildren();//destroying old intersections (even though we are not recalculating)
    if(handle && (handle.type == 'stroke' || handle.type == 'segment')){
      var p = event.point; // old
      var p2 = p + event.delta; // new
      var c = activeItem.position;
      if ((c - p).length > (c - p2).length){
        activeItem.scaling -= 0.005*event.delta.length;
      } else {
        activeItem.scaling += 0.005*event.delta.length;
      }
      if(debug_mode){
        console.log("Circle " + activeItem.data.circleId + " has radius " + activeItem.bounds.width/2);
      }
    }
    //else move the circle
    else {
      var data = activeItem.data.circleId;
      if(activeItem){
        activeItem.translate(event.delta);
        project.getItem({data: {textId: data}}).translate(event.delta);
        // + activeItem.position);
        if(debug_mode){
          console.log("Circle " + activeItem.data.circleId + " has position " + activeItem.position);
        }
      }
    }//end if circle edge or circle

//need if user clicks canvas 

if(debug_mode){

console.log("Clicked canvas");

}

  }

  intersections();
 // fixLayers();

}//end else

}//end mouse dragging function

//on mouse up function
function onMouseUp(event){

  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  intersect = false; // why?


  //need to de select active item
  //TODO: recalculate all intersections
  if(dragged){//if the user dragged the circle
    //remove all old intersections
    //for(var i in iLayer.children){
    //  iLayer.children[i].remove(); 
    //}
    
    intersections();

    //console.log("iLayer.children.length before: " + iLayer.children.length);
    //iLayer.removeChildren();
    //console.log("iLayer.children.length after: " + iLayer.children.length);

    if(debug_mode){
      console.log("Circle " + activeItem.data.circleId + " has position " + activeItem.position);

      console.log("Circle " + activeItem.data.circleId + " has radius " + activeItem.bounds.width/2);
    }  

    //create new intersections here
    //calculate new intersections by calling graces function
    fixLayers();
  }

  dragged = false;

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
  if(debug_mode){
    console.log("Looking for circle " + targetName);
  }
  var obj = project
  //.getItem({data: {layerName: "circles"}})
    .getItem({data: {circleId: parseInt(targetName)}});
    if(obj == null){
      recreate();
    }
    obj = project
      .getItem({data: {circleId: parseInt(targetName)}});
  var objText = project
  //.getItem({data: {layerName: "circles"}})
    .getItem({data: {textId: parseInt(targetName)}});
  obj.visible = true;
  objText.visible = true;
  if(debug_mode){
    console.log(obj);
  }
  var t = project.getItem({
    //_class: "PointText"
    data: {textId: parseInt(targetName)}
  });
  t.content = text;

  insert = true;
  intersections();
  return false;
} //end doSubmit function

window.doSubmit= doSubmit;
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
