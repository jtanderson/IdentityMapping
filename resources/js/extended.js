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

var fixLayers = function(){
  var iLayer = project.getItem({data: {layerName: "intersections"}});
  var cLayer = project.getItem({data: {layerName: "circles"}});
  var tLayer = project.getItem({data: {layerName: "labels"}});
  tLayer.sendToBack();
  cLayer.sendToBack();
  iLayer.sendToBack();

  console.log('Fixed layers...');
}//end fix layers function

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
          int_ij.data.intersectId = ""+i+j;
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
          int_ij.data.intersectId = ""+i+j;
          for(var k=j+1;k<6;k++){ //3
            var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
            if( c_k.visible ){//if three circles overlap, then create intersection
              var int_ijk = int_ij.intersect(c_k, {insert: false}); //3 way int
              int_ijk.selected = false;
              int_ijk.data.intersectId= ""+i+j+k;
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
          int_ij.data.intersectId = ""+i+j;
          for(k=j+1;k<6;k++){ //3
            var c_k = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: k}});
            if( c_k.visible ){//if three circles overlap, then create intersection
              var int_ijk = int_ij.intersect(c_k, {insert: false}); //3 way int
              int_ijk.selected = false;
              int_ijk.data.intersectId= ""+i+j+k;
              for(var l = k+1;l<6; l++){ //4
                var c_l = project.getItem({data: {layerName: "circles"}}).getItem({data: {circleId: l}});
                if( c_l.visible ){ //if four circles overlap, then create intersection
                  var int_ijkl = int_ijk.intersect(c_l, {insert: false}); //4 way int
                  int_ijkl.selected = false;
                  int_ijkl.data.intersectId = ""+i+j+k+l;
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
    var int_ijklm = iLayer.getItem({data: {intersectId: "1234"}}).intersect(c_m, {insert: false}); //5 way int
    int_ijklm.data.intersectId = ""+i+j+k+l+"5";
    iLayer.addChild(int_ijklm); 
  }//end the five single

}//end intersections function


//needs to recreate circles & intersections on page
var intialize = function(){

  var circle = Array(5);

  for(var i=1; i<=5; i++){

    var circleID = i;

    circle[i] = Array();

    // var form = document.getElementById("circle-" + i);
    var circle_x = document.getElementById("circle-"+circleID+"-center-x").value;
    console.log("circle "+i+" x retrieved is " + circle_x);
    var circle_y = document.getElementById("circle-"+circleID+"-center-y").value;
    console.log("circle "+i+" y retrieved is " + circle_y);
    var radius = document.getElementById("circle-"+circleID+"-radius").value;
    console.log("circle "+i+" radius retrieved is " + radius);
    var line_style = document.getElementById("circle-"+circleID+"-line_style").value;
    var color = document.getElementById("circle-"+circleID+"-color").value;
    var dbid = document.getElementById("circle-"+circleID+"-id").value;
    var label = document.getElementById("circle-"+circleID+"-label").value;
    console.log("This is the circle label" + label);

    //should return "" if no circle

    circle[i]['circle_x'] = circle_x;
    // console.log(circle[i]['circle_x']);
    circle[i]['circle_y']  = circle_y;
    circle[i]['radius'] = radius;
    circle[i]['label'] = label;
    circle[i]['color'] = color;
    circle[i]['dbid'] = dbid;


    var min = 55;
    var max = 135;
    var minR = 125;
    var maxR = 650;

    var exists = true;

    if(circle[i]['dbid'] == ""){

      exists = false;
      // console.log("I think, therefore I don't exist");
      circle[i]['label'] = "Circle " + i;
      circle[i]['circle_x'] = Math.floor(Math.random() * (+maxR - +minR)) + +minR;
      circle[i]['circle_y'] = Math.floor(Math.random() * (+maxR - +minR)) + +minR;
      circle[i]['radius'] = Math.floor(Math.random() * (+max - +min)) + +min;
      circle[i]['color'] = new Color(1, 1, 1, 0.75);
    }

    if(circle[i]['color'] == "" || "0,0,0"){
      circle[i]['color'] = new Color(1, 1, 1, 0.75);
    }


    var circ = new Path.Circle({
      center: [circle[i]['circle_x'], circle[i]['circle_y']],
      radius: circle[i]['radius'],
      fillColor: circle[i]['color'],
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

  //8/18
  // layering.getItem('123') - colr & border style 

  intersections();

} //end of init

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

  fixLayers();

  if(hitResult = iLayer.hitTest(event.point)){//if the intersection layer is hit

    activeItem = hitResult.item; // will be a intersection
    activeItem.selected = true;
    intersect = true;
    if(debug_mode){
      console.log("User clicked an intersection with id " + hitResult.item.data.intersectId);
    }

    //retrieves color slider
    colorSlider = document.getElementById("rangeIntersect");

    //retrieves color
    var colorStr = activeItem.fillColor._canvasStyle;
    var test_r, test_b;
    //retrieves r and b
    test_r = colorStr.split("(")[1].split(",")[0]; //colorStr[0] is r, colorStr[1] is g
    test_b = colorStr.split("(")[1].split(",")[2]; //colorStr[2] is b

    console.log("I think intersection " + activeItem.id + " colors are " + test_r + " and " + test_b);

    //sets sliderIntersect value (slider's position) to that "color" on its range
    colorSlider.value = (1-test_r/255)*100;
    //(7/20) which then calls change event 

    saveIntersect();

  } else if(hitResult = cLayer.hitTest(event.point)){//if the circle layer is hit

    activeItem = hitResult.item; // will be a circle
    activeItem.selected = true;

    console.log(activeItem.fillColor);

    //retrieves color slider
    colorSlider = document.getElementById("rangeIntersect");

    //retrieves circle's color
    var colorStr = activeItem.fillColor._canvasStyle;
    var test_r, test_b;
    //retrieves r and b
    test_r = colorStr.split("(")[1].split(",")[0];
    test_b = colorStr.split("(")[1].split(",")[2];

    console.log("I think circle " + activeItem.id + " colors are " + test_r + " and " + test_b);

    //sets sliderIntersect value (slider's position) to that "color" on its range
    colorSlider.value = (1-test_r/255)*100;

    //**actual color change occurs in event listener
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

//colors circles & intersections
var colorSlider = document.getElementById("rangeIntersect");

//(7/22): Need to check if circle or intersection before using saveCircle/saveInt.
colorSlider.addEventListener("change",function(){

  var cLayer = project.getItem({data: {layerName: "circles"}});
  var iLayer = project.getItem({data: {layerName: "intersections"}});

  if( activeItem ){

    console.log(activeItem);

    var r,b;
    r=Math.round(255*(100-colorSlider.value)/100);
    b=Math.round(255*colorSlider.value/100);
    activeItem.fillColor = "rgb("+r+",0,"+b+",0.9)";
    // console.log("Circle " + activeItem.id +"'s color is " + "rgb("+r+",0,"+b+")");

    if(iLayer.isAncestor(activeItem)){

      var intersectID = activeItem.data.intersectId;
      saveIntersect(intersectID);

    }else if(cLayer.isAncestor(activeItem)){

      var circleID = activeItem.data.circleId;
      saveCircle(circleID);
    }
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


saveIntersect = function(circleID){

  console.log("In saveInt");

  var iLayer = project.getItem({data: {layerName: "intersections"}});

  var intersections = Array();

  console.log("This is iLayer.children length " + iLayer.children.length);

  // console.log("This is iLayer.children " + iLayer.children);

  for(var i in iLayer.children){

    //for each intersection, make an object

    var child = {};

    // console.log("This is iLayer.children " + iLayer.children[i]);
    console.log("This is iLayer.children id " + iLayer.children[i].data.intersectId);

    //if the child is not empty, and includes the circleID in its ID
    //add a child object to array
    if(!iLayer.children[i].isEmpty()){
      if(iLayer.children[i].data.intersectId.includes(circleID)){

        child.id = iLayer.children[i].data.intersectId; 
        child.area =  iLayer.children[i].area;
        child.color = iLayer.children[i].fillColor.getComponents().toString();
        // console.log("This is the intersection child" + child);

        intersections.push(child);
      }else{
        console.log("ERROR: circleID is not in the intersection");
      }
    }else{
      console.log("ERROR: Child is empty");
    }

  }//end for 

  $.post("/saveIntersectData", {
    "intersections": intersections, /* an array which holds all intersections */ 
  })
    .done(function(data){
      console.log("Save intersection complete!");
    }); 

}//end saveInt

//sends the circle data to DB storage
saveCircle = function(circleID){

  var circleLabel = document.getElementById("circle-"+circleID+"-label").value;

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

  // console.log(obj);
  // console.log(obj.fillColor);
  // console.log(obj.fillColor.canvasStyle);

  // console.log(problem);

  $.post("/saveCircleData", problem).done(function(data){
    console.log("Save complete!");
  });

}

doSubmit = function(e){

  e.preventDefault();

  var circleID = event.target.id.split("-")[1];
  // console.log(circleID);

  saveCircle(circleID);

  return false;
} //end doSubmit function
