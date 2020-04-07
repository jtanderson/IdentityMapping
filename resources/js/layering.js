//paper = require('paper/dist/paper-full');
$.ajaxSetup({
  headers: {
      'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});

var dbarray = new Array();

console.log("Loading Layering");
console.log(Layer);

//******************************************************

// <script>
// <?php
//     $circlelayer = project.getItem({data: {layerName: "circles"}});
//     $intlayer = project.getItem({data: {layerName: "intersections"}});
//     $textlayer = project.getItem({data: {layerName: "text"}});

//     $dataObject = $_POST;
//     var_dump($dataObject);

//     $json = json_encode($dataObject);
//     file_put_contents('data.txt', $json);
// ?>
// <script>

// $(document).ready(function(){
//   localStorage.clear();

//   $("form").on("submit", function() {
//       if(window.localStorage!==undefined) {
//           var fields = $(this).serialize();

//           localStorage.setItem("eloqua-fields", JSON.stringify(fields));
//           alert("Stored Succesfully");
//           $(this).find("input[type=text]").val(""); //clears input fields, not select boxes etc.
//           alert("Now Passing stored data to Server through AJAX jQuery");

//           $.ajax({
//              type: "POST",
//              url: "backend.php", //where does this get sent to in db?         
//              data: fields,
//              success: function(data) {
//                 $('#output').html(data); //JSON output goes here
//              }
//           });

//       } else {
//           alert("Storage Failed. Try refreshing");
//       }
//   });
// });

//**************************************************

//if there are circles already saved in this session
var answer = localStorage["extended"];
if(answer == "true"){
  project.importJSON(localStorage["saved"]);
  creation();
  dbarray.push(project.exportJSON());
}
else{

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

//creates the text layer which will be the top layer
  var textLayer = new Layer();
  textLayer.data.layerName = "text";

  for(var i=1; i<=5; i++){//loops the five text creation and binds to the circle objects position
    var c = project.getItem({data: {circleId: i}});
    var text = new PointText({
      fillColor:  'red',
      content:  "Circle " + i,
      position: c.getItem({data: {center}});
      insert: false,
      visible: false,
      data: {
        textId: i
      }
  });

  textLayer.addChild(text);//adds text to the text layer
}
}



//group creation for layering the intersections
var group2 = new Group();
var group3 = new Group();
var group4 = new Group();
var group5 = new Group(); 

function creation(){
  var iLayer = project.getItem({data:{layerName: "intersections"}});
  var cLayer = project.getItem({data:{layerName: "circles"}});
  var tLayer = project.getItem({data:{layerName: "text"}});
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

}//end intersections function

//function for fixing the layers
var fixLayers = function(){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var tLayer = project.getItem({data: {layerName: "text"}});
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
      position: c.center,
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
//G B: Do we even use tester anymore?


var intersect = false;

//mouse down function
paper.tool.onMouseDown = function(event){
  console.log("onMouseDown running!");
  if(activeItem){
    activeItem.selected = false;
    //need something else here maybe, is this where tester comes in--tester is if clicked, and if clicked, item = activeItem?
  }

  handle = null;
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});


  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit
    activeItem = hitResult.item; // will be a intersection
    activeItem.selected = false; //turn off intersection selection
    intersect = true;
    console.log("User clicked an intersection with id " + hitResult.item.data.id);

    dbarray.push(paper.project.exportJSON());

  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit
    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;
    console.log("User clicked circle: " + hitResult.item.data.circleId);

    // TODO: replace with an ajax call to send the JSON to the backend database
    dbarray.push(paper.project.exportJSON());

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
  }else{
    dragged=true;
    var cLayer = project.getItem({data: {layerName: "circles"}});
    var iLayer = project.getItem({data: {layerName: "intersections"}});
    // user is scaling
    if(!intersect){//if it is a circle boundary being hit
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
        
        console.log("Circle " + activeItem.data.circleId + " has radius " + activeItem.bounds.width/2);
      }
      //else move the circle
      else {
        var data = activeItem.data.circleId;
        if(activeItem){
          activeItem.translate(event.delta);
          project.getItem({data: {textId: data}}).translate(event.delta);
          // + activeItem.position);
            console.log("Circle " + activeItem.data.circleId + " has position " + activeItem.position);
        }
      }//end if circle edge or circle
        console.log("Clicked canvas");
    }

    intersections();

  }//end else
}//end mouse dragging function

//on mouse up function
function onMouseUp(event){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  intersect = false; // why?
  if(dragged){//if the user dragged the circle


    intersections();

      console.log("Circle " + activeItem.data.circleId + " has position " + activeItem.position);

      console.log("Circle " + activeItem.data.circleId + " has radius " + activeItem.bounds.width/2);

    //create new intersections here
    //calculate new intersections by calling graces function
    fixLayers();
    dbarray.push(paper.project.exportJSON());

  }
  dragged = false;
}//end mouse up function
var scope = this;

//sends the circle data to local storage

doSubmit = function(e){
  console.log("doSumbit here");

  //scope.activate();
  e.preventDefault();

  // TODO: example ajax request
  

  $.post("/saveCircleData", {"item one": 1, "item two": 2})
  .done(function(data){
    console.log("Save complete!");
  });

  // the id of the circle we're changing
  var targetName = e.target.querySelector("[name=formId]").value.toLowerCase();
  // holds the user's text entry
  var text = e.target.getElementsByTagName("input")[0].value;

    console.log("Looking for circle " + targetName);

  localStorage[targetName] = text;
  var obj = project
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

    console.log(obj);
  
    var t = project.getItem({
    //_class: "PointText"
    data: {textId: parseInt(targetName)}
  });
  t.content = text;

  insert = true;
  intersections();
  dbarray.push(paper.project.exportJSON());
  // console.log(dbarray);
  return false;
} //end doSubmit function

//submits json
window.doSubmit= doSubmit;

