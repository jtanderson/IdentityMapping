/*
 * CURRENT TODO. MUST BE DONE BEFORE FIRST DEPLOY:
 *   - move things into functions
 * - implement "lock" mode where user cannot drag or resize circles
 * - Put a hard cap on circle radius. Something like at least 5 px and at most 1/4 the width of canvas
 * - save events in some way to the browser "localStorage"
 * TODO AFTER DEPLOY:
 * - Populate circles from databse
 * - Save events to dastabase
 * - Integrate results into survey
 */

var text1 = new PointText(new Point(100,100));
text1.fillColor = 'black';
text1.content = 'Circle 1';

var c1 = new Path.Circle({
  center: [300,200],
  radius: 100,
  fillColor: 'white',
  strokeColor: 'black',
  //insert: false
});
text1.position = c1.position;

var group1 = new Group([c1, text1]);
group1.data.id = 1;
group1.visible = false;
var text2 = new PointText(new Point(100,100));
text2.fillColor = 'black';
text2.content = 'Circle 2';

var c2 = new Path.Circle({
  center: [150,525],
  radius: 125,
  fillColor: 'white',
  strokeColor: 'black'
});
text2.position = c2.position;

var group2 = new Group([c2, text2]);
group2.data.id = 2;
group2.visible = false;
text3= new PointText(new Point(100, 100));
text3.fillColor = 'black';
text3.content= 'Circle 3';

c3 = new Path.Circle({
  center: [567,300],
  radius: 65,
  parent: groups,
  fillColor: 'white',
  strokeColor: 'black'
});
text3.position = c3.position;
group3 = new Group([c3, text3]);

group3.data.id=3;

group3.visible = false;

var text4= new PointText(new Point(100, 100));
text4.fillColor = 'black';
text4.content= 'Circle 4';

var c4 = new Path.Circle({
  center: [100,300],
  radius: 88,
  fillColor: 'white',
  strokeColor: 'black'
});

text4.position = c4.position;
var group4 = new Group([c4, text4]);
group4.data.id = 4;
group4.visible = false;
var text5= new PointText(new Point(100, 100));
text5.fillColor = 'black';
text5.content= 'Circle 5';

var c5 = new Path.Circle({
  center: [445,505],
  radius: 110,
  fillColor: 'white',
  strokeColor: 'black'
});
c5.data.id=5;
text5.position = c5.position;
var group5 = new Group([c5, text5]);
group5.data.id=5;
group5.visible = false;


var groups = new Group({
  children: [group1, group2, group3, group4, group5],
  insert: true
});

var groupArray = [undefined, group1, group2, group3, group4, group5];

// currently, will be an object, where each index is a Path
// MIGHTDO: change to be an object, with metadata and a Path
// e.g. intersections["123"].color = whaterver the user entered
// so when we re-calculate intersections["123"], we can color intersections["123"].path.fillColor = intersections["123"].color
var intersections = {};

for(var i=1;i<6;i++){
  for(var j=i+1;j<6;j++){
    intersections[""+i+j] = groupArray[i].children[0].intersect(groupArray[j].children[0]);
    for(var k=j+1;k<6;k++){
      intersections[""+i+j+k] = intersections[""+i+j].intersect(groupArray[k].children[0]);
      for(var l = k+1;l<6; l++){
        intersections[""+i+j+k+l] = intersections[""+i+j+k].intersect(groupArray[l].children[0]);
      }
    }
  }
}

intersections["12345"] = c5.intersect(intersections["1234"]);

for (var i in intersections){
  intersections[i].moveAbove(c1);
  intersections[i].moveAbove(c2);
  intersections[i].moveAbove(c3);
  intersections[i].moveAbove(c4);
  intersections[i].moveAbove(c5);
  intersections[i].moveAbove(group1);
  intersections[i].moveAbove(group2);
  intersections[i].moveAbove(group3);
  intersections[i].moveAbove(group4);
  intersections[i].moveAbove(group5);
  intersections[i].moveBelow(text1);
  intersections[i].moveBelow(text2);
  intersections[i].moveBelow(text3);
  intersections[i].moveBelow(text4);
  intersections[i].moveBelow(text5);
}

// intersection between cicles c_i_1, ..., c_i_k is at intersections[i_1 i_2 ... i_k]
// region145 is at intersections["145"]
// to parse, split the string index to get the numbers of the regions

var activeItem; 
var handle;
var dragged = false; 

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
    if(!intersections[_int].selected){
      intersections[_int].remove();
    }
  }
} 
//end onmousedown function

var segment;

function onMouseDrag(event) {
  dragged = true;

  if ( activeItem){
    // dirty.
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
    for (var _int in intersections){
      // TODO: maybe remove if destruction happens in onMouseDrag
      intersections[_int].remove();
    }
    for(var i=1;i<6;i++){
      for(var j=i+1;j<6;j++){
        if( groupArray[j].visible ){ // TODO: bring back visibility testing
          intersections[""+i+j] = groupArray[i].children[0].intersect(groupArray[j].children[0]);
          for(var k=j+1;k<6;k++){
            intersections[""+i+j+k] = intersections[""+i+j].intersect(groupArray[k].children[0]);
            for(var l =k+1; l < 6; l++){
              intersections[""+i+j+k +l] = intersections[""+i+j + k].intersect(groupArray[l].children[0]);
            }
          }
        }
      }
    }

    console.log(intersections);
    
    /*
     * More sensible logic?
     */
    for (var _int in intersections){
      if( ! intersections[_int].isEmpty() ){
       // intersections[_int].fillColor = "blue";
        intersections[_int].bringToFront();
        console.log("====== intersections[_int].parent ======");
        console.log(intersections[_int].parent);
        intersections[_int].parent.bringToFront();
        /*
        intersections[_int].moveAbove(c1);
        intersections[_int].moveAbove(c2);
        intersections[_int].moveAbove(c3);
        intersections[_int].moveAbove(c4);
        intersections[_int].moveAbove(c5);
        intersections[_int].moveAbove(group5);
        intersections[_int].moveAbove(group4);
        intersections[_int].moveAbove(group3);
        intersections[_int].moveAbove(group2);
        intersections[_int].moveAbove(group1);
        intersections[_int].moveBelow(text1);
        intersections[_int].moveBelow(text2);
        intersections[_int].moveBelow(text3);
        intersections[_int].moveBelow(text4);
        intersections[_int].moveBelow(text5);
        */
        intersections[_int].isIntersection = "true";
      }
    }
    // HERE, reset activeItem to what it was, if it was an intersection
  }

  dragged = false; // reset
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
      obj = groups.children[i];
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


