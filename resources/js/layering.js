//paper = require('paper/dist/paper-full');
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

console.log("Loading Layering");

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


//TODO: move to document.onready event (window load) / read up on better options

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

saveIntersect = function(circleID){

  var iLayer = project.getItem({data: {layerName: "intersections"}});

  var intersections = Array();

  console.log("saveIntersect here");

  console.log("This is iLayer.children length " + iLayer.children.length);

  console.log("This is iLayer.children " + iLayer.children);

  for(var i in iLayer.children){

    var child = {};

    console.log("This is iLayer.children " + iLayer.children[i]);
    console.log("This is iLayer.children id " + iLayer.children[i].data.id);

    if(!iLayer.children[i].isEmpty() && iLayer.children[i].data.id.includes(circleID)){

      child.id = iLayer.children[i].data.id; 
      child.area =  iLayer.children[i].area;
      
      intersections.push(child);
    }
  }

  $.post("/saveIntersectData", {
        "intersections": intersections, /* an array which holds all intersections */ 
  })
  .done(function(data){
    console.log("Save intersection complete!");
  }); 

}

intersections();

// //group creation for layering the intersections
// var group2 = new Group();
// var group3 = new Group();
// var group4 = new Group();
// var group5 = new Group(); 

function creation(){
  var iLayer = project.getItem({data:{layerName: "intersections"}});
  var cLayer = project.getItem({data:{layerName: "circles"}});
  var tLayer = project.getItem({data:{layerName: "labels"}});
  for(var i in cLayer.children){
    cLayer.children[i].fillColor = new Color(1, 1, 1, 0.75);
    cLayer.children[i].dashArray = false;
  }
  for(var j in iLayer.children){
    iLayer.children[j].fillColor = new Color(1, 1, 1, 0.75);
  }
}

//function for creating intersections
function intersections(){
    
    var iLayer = project.getItem({data:{layerName: "intersections"}});
    iLayer.removeChildren();//destroying old intersections

    for(var i = 1; i < 6; i++){
      var c_i = project
        .getItem({data: {layerName: "circles"}})
        .getItem({data: {circleId: i}});
      if( c_i.visible ){
        for(var j=i+1;j<6;j++){
          var c_j = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: j}});
          if( c_j.visible ){ //if two circles overlap, then create intersection
            var int_ij = c_i.intersect(c_j, {insert: false}); //2 way int
            int_ij.selected = false;
            int_ij.data.id = ""+i+j;
            iLayer.addChild(int_ij); //2
          }
        }
      }
    } //end the twos loop

    for(i=1;i<6;i++){ //1
      var c_i = project
        .getItem({data: {layerName: "circles"}})
        .getItem({data: {circleId: i}});
      if( c_i.visible ){
        for(j=i+1;j<6;j++){ //2
          var c_j = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: j}});
          if( c_j.visible ){ //if two circles overlap, then create intersection
            var int_ij = c_i.intersect(c_j, {insert: false}); //2 way int
            int_ij.selected = false;
            int_ij.data.id = ""+i+j;
            for(var k=j+1;k<6;k++){ //3
              var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
              if( c_k.visible ){//if three circles overlap, then create intersection
                var int_ijk = int_ij.intersect(c_k, {insert: false}); //3 way int
                int_ijk.selected = false;
                int_ijk.data.id = ""+i+j+k;
                iLayer.addChild(int_ijk); 
              }
            }
          }
        }
      }
    } //end the threes loop

    for(i=1;i<6;i++){ //1
      var c_i = project
        .getItem({data: {layerName: "circles"}})
        .getItem({data: {circleId: i}});
      if( c_i.visible ){
        for(j=i+1;j<6;j++){ //2
          var c_j = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: j}});
          if( c_j.visible ){ //if two circles overlap, then create intersection
            var int_ij = c_i.intersect(c_j, {insert: false}); //2 way int
            int_ij.selected = false;
            int_ij.data.id = ""+i+j;
            for(k=j+1;k<6;k++){ //3
              var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
              if( c_k.visible ){//if three circles overlap, then create intersection
                var int_ijk = int_ij.intersect(c_k, {insert: false}); //3 way int
                int_ijk.selected = false;
                int_ijk.data.id = ""+i+j+k;
                for(var l = k+1;l<6; l++){ //4
                  var c_l = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: l}});
                  if( c_l.visible ){ //if four circles overlap, then create intersection
                    var int_ijkl = int_ijk.intersect(c_l, {insert: false}); //4 way int
                    int_ijkl.selected = false;
                    int_ijkl.data.id = ""+i+j+k+l;
                    iLayer.addChild(int_ijkl);//4
                  } // c_l visible
                } // l loop
              } // c_k visible
            } // k loop
          } // c_j visible
        } // j loop
      } // c_i visible
    } // i loop 
    //ends the fours loop

  var c_m = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 5}});
  var two = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 2}});
  var three = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 3}});
  var four = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 4}});
  var one = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: 1}});

  if( c_m.visible && two.visible && three.visible &&four.visible && one.visible ){
    var int_ijklm = iLayer.getItem({data: {id: "1234"}}).intersect(c_m, {insert: false}); //5 way int
    int_ijklm.data.id = ""+i+j+k+l+"5";
    iLayer.addChild(int_ijklm); 
  }//end the five single

  //add intersections to db?

}//end intersections function

//function for fixing the layers
var fixLayers = function(){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var tLayer = project.getItem({data: {layerName: "labels"}});
  tLayer.sendToBack();
  iLayer.sendToBack();
  cLayer.sendToBack();

  // if(debug_mode){
  //   console.log('Fixed layers...');
  // }

}//end fix layers function


// the one object that is under user focus
// (nullity) NEEDS TO BE MAINTAINED VIGILANTLY
var activeItem = null;
// hitTests within x pixels of circle boundary, to detect resize instead of drag
var handle;
// if this ever becomes true, we need to recalculate intersections
var dragged = false; 
var intersect = false;

//mouse down function
paper.tool.onMouseDown = function(event){

  console.log("onMouseDown running!");

  //(7/8) error somewhere, maybe here?
  if(activeItem){
    activeItem.selected = false;
  }

  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});


  hitResult = iLayer.hitTest(event.point);
  if(false && hitResult != null ){//if the intersection layer is hit
    activeItem = hitResult.item; //activeItem will be a intersection
    
    console.log("User clicked an intersection with id " + hitResult.item.data.id);
    dbarray.push(paper.project.exportJSON());

  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit
    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;
    console.log("User clicked circle: " + hitResult.item.data.circleId);

    //bring circle selected to top of canvas?
    //hitResult.item.data.circleId.bringToFront();

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
      console.log("Nothing hit");
    if( activeItem ){
      activeItem.selected = false;
    }
    activeItem = null;
  }
}//end of the mouse down function

var segment;

//when user clicks, holds down, and drags
paper.tool.onMouseDrag = function(event){
  if(activeItem == null){
    return;
  }
  else{

    dragged=true;
    var cLayer = project.getItem({data: {layerName: "circles"}});
    var iLayer = project.getItem({data: {layerName: "intersections"}});
    
    // TODO: instead of using a variable, test which layer activeItem is in!!
    // circleLayer.isAncestor(activeItem) (For circles inside circles)

    if( cLayer.isAncestor(activeItem) ){ //if circle

      iLayer.removeChildren();//destroying old intersections (even though we are not recalculating)

      //if the user clicked near the circles boundary
      if(handle && (handle.type == 'stroke' || handle.type == 'segment')){
        var p = event.point; // old
        var p2 = p + event.delta; // new
        var c = activeItem.position;
        if ((c - p).length > (c - p2).length){
          activeItem.scaling -= 0.005*event.delta.length;
        } else {
          activeItem.scaling += 0.005*event.delta.length;
        }
        
        console.log("Circle " + activeItem.data.circleId + " has radius " + activeItem.bounds.width/2);
      }
      //else move the circle
      else {
        var data = activeItem.data.circleId;
        if(activeItem){
          activeItem.translate(event.delta);
          project.getItem({data: {labelId: data}}).translate(event.delta);
            console.log("Circle " + activeItem.data.circleId + " has position " + activeItem.position);
        }


      }//end if circle edge or circle
        console.log("Clicked canvas");
    }

    intersections();

  }//end else
}//end mouse dragging function


//sends the circle data to DB storage
saveCircle = function(circleID){

  var circleLabel = document.getElementById("circle-"+circleID+"-label").value;
  console.log(circleLabel);

  // var dbid = document.getElementById("circle-"+circleID+"-id").value;

  var obj = project.getItem({data: {circleId: parseInt(circleID)}});

  var objLabel = project.getItem({data: {labelId: parseInt(circleID)}});
  objLabel.content = circleLabel;

  obj.visible = true;
  objLabel.visible = true;

  // console.log(obj);
 
  $.post("/saveCircleData", {
      "number": circleID,
      "position_x": obj.position.x,
      "position_y": obj.position.y,
      "label": circleLabel,
      "radius": (obj.bounds.width/2),
  })
  .done(function(data){

    console.log("Save circle complete!");

    saveIntersect(circleID);

  });

}


//on mouse up function
paper.tool.onMouseUp = function(event){

  var cLayer = project.getItem({data:{layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  //is circle check
  if( cLayer.isAncestor(activeItem) ){

      //(7/8) I think this is where the error is
      var circleID = activeItem.data.circleId;
      console.log("calculated circle id");
      console.log(circleID);

      // var iLayer = project.getItem({data: {layerName: "intersections"}});
      // var cLayer = project.getItem({data: {layerName: "circles"}});

      if(dragged){//if the user dragged the circle

        intersections();

          // console.log("Circle " + activeItem.data.circleId + " has position " + activeItem.position);

          // console.log("HERE2");

          console.log("Circle " + activeItem.data.circleId + " has radius " + activeItem.bounds.width/2);

          fixLayers();

      }

  }//end iscircle check

  // saveIntersect(circleID);
  saveCircle(circleID);

  dragged = false;


}//end mouse up function


var scope = this;

//function tied to btn that first adds circle
doSubmit = function(e){

  console.log("doSumbit Layering here");

  e.preventDefault();

  //should work when circles are inputted/created 
  var circleID = e.target.id.split("-")[1];
  console.log(circleID);

  saveCircle(circleID);

  // var circleLabel = document.getElementById("circle-"+circleID+"-label").value;
  // console.log(circleLabel);

  // var obj = project.getItem({data: {circleId: parseInt(circleID)}});

  // // console.log(obj.position.x);
  // // console.log(obj.position.y);
  // // console.log(obj.bounds.width/2);

  // var objLabel = project.getItem({data: {labelId: parseInt(circleID)}});
  // objLabel.content = circleLabel;

  // obj.visible = true;
  // objLabel.visible = true;

  // // console.log(obj);

  // insert = true;
 
  // $.post("/saveCircleData", {
  //     "number": circleID,
  //     "position_x": obj.position.x,
  //     "position_y": obj.position.y,
  //     "label": circleLabel,
  //     "radius": (obj.bounds.width/2),
  // })
  // .done(function(data){
  //   console.log("Save complete!");
  // });

  // $.post("/saveIntersectData", {
  //       "created": "" /*time stamp here */,
  //       "updated": "" /*time stamp here */,
  //       "circle1": "" /*circle 1 id*/,
  //       "circle2": "" /*circle 2 id*/,
  //       "area": "" /*calculated in intersection function*/
  // })
  // .done(function(data){
  //   console.log("Save complete!");
  // });

  // insert = true;

  intersections();

  //old logic -> dbarray.push(paper.project.exportJSON());
  //             console.log(dbarray);
  
  return false;
} //end doSubmit function

//G: Do we still need line below?
//window.doSubmit = doSubmit;

