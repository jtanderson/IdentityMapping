var c1 = new Path.Circle({
    center: [300,200],
    radius: 100,
    fillColor: 'white',
    strokeColor: 'black',
    id: 1
    //insert: false
  });
  var c2 = new Path.Circle({
    center: [150,525],
    radius: 125,
    fillColor: 'white',
    strokeColor: 'black',
    id: 2
  });
  var c3 = new Path.Circle({
    center: [567,300],
    radius: 65,
    // parent: groups,
    fillColor: 'white',
    strokeColor: 'black',
    id: 3
  });
  var c4 = new Path.Circle({
    center: [100,300],
    radius: 88,
    fillColor: 'white',
    strokeColor: 'black',
    id: 4
  });
  var c5 = new Path.Circle({
    center: [445,505],
    radius: 110,
    fillColor: 'white',
    strokeColor: 'black',
    id: 5,
    data: {
      "id": "5"
    }
  });
 
  
  console.log(project.layers);
  console.log("===================");
  
  project.layers[0].data.layerName = "circles";
  // has all the circles
  var circleLayer = project.layers[0];
  
  
  
  
  
  
  
  //everything above should be for circles only
  //layer for adding intersections
  // var secondLayer = new secondLayer();
  
  var intersectionLayer = new Layer();
  // project.addLayer(intersectionLayer);
  intersectionLayer.data.layerName = "intersections";
  //intersectionLayer.activate(); // not needed now, but later
  
  
  var intersections = {};
  
  for(var i=1;i<6;i++){
    for(var j=i+1;j<6;j++){
      intersections[""+i+j] = project.layers[0].children[i-1].intersect(project.layers[0].children[j-1]);
      for(var k=j+1;k<6;k++){
        intersections[""+i+j+k] = intersections[""+i+j].intersect(project.layers[0].children[k-1]);
        for(var l = k+1;l<6; l++){
          intersections[""+i+j+k+l] = intersections[""+i+j+k].intersect(project.layers[0].children[l-1]);
        }
      }
    }
  }
  
  intersections["12345"] = project.layers[0].children[5].intersect(intersections["1234"]);

  
  //layer for adding text and manipulating text, will be the top layer, grouping should be here as it ties everything together
  var textLayer = new Layer();
  textLayer.layerName = "text";
  
  console.log(project.layers);
  
  var text1 = new PointText(new Point(100,100));
  text1.fillColor = 'black';
  text1.content = 'Circle 1';
  text1.position = c1.position;
  text1.id = '1';
  
  var text2 = new PointText(new Point(100,100));
  text2.fillColor = 'black';
  text2.content = 'Circle 2';
  
  
  text3= new PointText(new Point(100, 100));
  text3.fillColor = 'black';
  text3.content= 'Circle 3';
  
  var text4= new PointText(new Point(100, 100));
  text4.fillColor = 'black';
  text4.content= 'Circle 4';
  
  var text5= new PointText(new Point(100, 100));
  text5.fillColor = 'black';
  text5.content= 'Circle 5';
  
  
  var fixLayers = function(){
    // because of binding, may need to use project.layers...
    
    textLayer.sendToBack();
    intersectionLayer.sendToBack();
    circleLayer.sendToBack();
  
    console.log('Fixed layers...');
    console.log(textLayer);
    console.log(intersectionLayer);
    console.log(circleLayer);
  }
  var group1 = new Group([project.layers[0].children[0], project.layers[2].children[0]]);
  group1.data.id = 1;
  // group1.visible = false;
  text2.position = c2.position;
  //console.log(group1);
  var group2 = new Group([project.layers[0].children[1], project.layers[2].children[1]]);

  group2.data.id = 2;
  // group2.visible = false;
  text3.position = c3.position;
  var group3 = new Group([project.layers[0].children[2], project.layers[2].children[2]]);

  group3.data.id=3;
  // group3.visible = false;
  text4.position = c4.position;
  var group4 = new Group([project.layers[0].children[3], project.layers[2].children[3]]);

  group4.data.id = 4;
  // group4.visible = false;
  //shouldnt be necessary?? c5.data.id=5;
  text5.position = c5.position;
  var group5 = new Group([project.layers[0].children[4], project.layers[2].children[4]]);
  group5.data.id=5;
  // group5.visible = false;
  
  var groups = new Group({
    children: [group1, group2, group3, group4, group5],
    insert: true
  });
  var textArray = [undefined, text1, text2, text3, text4, text5];
  var groupArray = [undefined, group1, group2, group3, group4, group5];
  text1.id = '1';
  text2.id = '2';
  text3.id = '3';
  text4.id = '4';
  text5.id = '5';
  
  

  
  var activeItem; 
  var handle;
  var dragged = false; 
  //end layering manipulation, starts functions and such
  function onMouseDown(event) {
    handle = null;
    var hitResult = groups.hitTest(event.point);
    if(activeItem){
      //this is how we define the handles to resize the circle
      handle = activeItem.hitTest(event.point, 
        {
          segments: true,
          stroke: true,
          fill: true,
          tolerance: 5
        }
      );
      //logging the active items on click
        console.log("Active item has children:");
        console.log(activeItem.children);
        //de selecting everything when nothing clicked
        if(activeItem.isIntersection == undefined){
          for(var c in activeItem.children){
            activeItem.children[c].selected = false;
          }
        } else {
          activeItem.selected = false;
        }
    }
    //sets active item to whatever is clicked
    activeItem = hitResult && hitResult.item;
    //this activeItem keeps cirle with the text but when combined doesnt work??
    if(activeItem){
      activeItem.selected = true;
      if(activeItem.isIntersection == undefined){
        activeItem = activeItem.parent;
      }
    } 
    else {
      console.log('nothing hit');
      return;
    }
    //removes intersections on click
    // move to drag?
    for (var _int in intersections){
      if(!project.layers[1].intersections[_int].selected){
        project.layers[1].intersections[_int].remove();
      }
    }
  } 
  //end onmousedown function
  
  var segment;

  function getIntersection(i,j){
    // check and make sure project.layers[1].data == "intersections"
    // if not, you can go and find the right one by looping project.layers
    //loop project.layers[1] look for child with data.id = "intersection-"+i+"-"j
    // return the correct child
  }
  
  function onMouseDrag(event) {
    dragged = true;
  
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
        //activeItem.translate(event.point - activeItem.position);
        // todo: only do this if movement isn't locked
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
      for (var _int in project.layers[1].intersections){
        // TODO: maybe remove if destruction happens in onMouseDrag
        project.layers[1].intersections[_int].remove();
      }
      for(var i=1;i<6;i++){
        for(var j=i+1;j<6;j++){
          if( groupArray[j].visible ){ // TODO: bring back visibility testing
            project.layers[1].intersections[""+i+j] = groupArray[i].children[0].intersect(groupArray[j].children[0]);
            for(var k=j+1;k<6;k++){
              project.layers[1].intersections[""+i+j+k] = intersections[""+i+j].intersect(groupArray[k].children[0]);
              for(var l =k+1; l < 6; l++){
                project.layers[1].intersections[""+i+j+k +l] = intersections[""+i+j + k].intersect(groupArray[l].children[0]);
              }
            }
          }
        }
      }
  
      console.log(intersections);
      
      /*
       * More sensible logic?
       */
      for (var _int in project.layers[1].intersections){
        if( ! project.layers[1].intersections[_int].isEmpty() ){
          project.layers[1].intersections[_int].bringToFront();

          console.log("====== intersections[_int].parent ======");
          console.log(project.layers[1].intersections[_int].parent);
          project.layers[1].intersections[_int].parent.bringToFront();

          intersections[_int].isIntersection = "true";
        }
      }
      // HERE, reset activeItem to what it was, if it was an intersection
  
    }
  
    dragged = false; // reset
    fixLayers();
  }
  
  var scope = this;
  
  /*
   * Called when "Add Circle" is clicked
   */
  doSubmit = function(e){
    scope.activate();
    e.preventDefault();
  
    console.log(e);
    console.log("Groups:");
    console.log(groups);
  
    console.log( );
    var targetName = e.target.querySelector("[name=formId]").value.toLowerCase();
    // holds the user's text entry
    var text = e.target.getElementsByTagName("input")[0].value;
    console.log(text);
    var obj;
   
    console.log("Looking for circle " + targetName);
  
    for( i = 0; i < groups.children.length; i++){
      if (groups.children[i].data.id == targetName){
        console.log("==================")
        obj = groups.children[i];
        console.log(text);
        localStorage[obj.data.id] = text;
        console.log("==================")
        break;
      }
    }
    console.log(obj);
    var t = obj.getItem({
      _class: "PointText"
    });
    t.content = text;
    obj.visible = true;
    return false;
  }
  window.doSubmit= doSubmit;
  //end doSubmit function
  
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
  
  
  