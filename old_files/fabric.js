 var from1 = new Point(0,0);
var to1 = new Point(0, 1000);
var path1 = new Path.Line(from1, to1);
path1.strokeColor = 'black';
var from2 = new Point(0,750);
var to2 = new Point(1000, 750);
var path2 = new Path.Line(from2, to2);
path2.strokeColor = 'black';
var from3 = new Point(0,0);
var to3 = new Point(1000, 0);
var path3 = new Path.Line(from3, to3);
path3.strokeColor = 'black';
var from4 = new Point(750,0);
var to4 = new Point(750, 1000);
var path4 = new Path.Line(from4, to4);
path4.strokeColor = 'black';
/*****************************/
      var text1 = new PointText(new Point(100,100));
text1.fillColor = 'black';
// Set the content of the text item:
text1.content = 'Circle 1';

var c1 = new Path.Circle({
    center: [300,200],
    radius: 100,
    //parent: originals,
    fillColor: 'white',
strokeColor: 'black'
});
text1.position = c1.position;

var group1 = new Group([c1, text1]);
group1.data.id = 1;
/****************************/
     var text2 = new PointText(new Point(100,100));
text2.fillColor = 'black';
// Set the content of the text item:
text2.content = 'Circle 2';

var c2 = new Path.Circle({
    center: [150,525],
    radius: 125,
    //parent: originals,
    fillColor: 'white',
strokeColor: 'black'
});
text2.position = c2.position;

var group2 = new Group([c2, text2]);
group2.data.id = 2;

/**************************/
var text3= new PointText(new Point(100, 100));
text3.fillColor = 'black';
text3.content= 'Circle 3';

var c3 = new Path.Circle({
    center: [567,300],
    radius: 125,
    parent: originals,
    fillColor: 'white',
strokeColor: 'black'
});
text3.position = c3.position;
var group3 = new Group([c3, text3]);
group3.data.id=3;

var text4= new PointText(new Point(100, 100));
text4.fillColor = 'black';
text4.content= 'Circle 4';

var c4 = new Path.Circle({
    center: [100,300],
    radius: 88,
    //parent: originals,
    fillColor: 'white',
strokeColor: 'black'
});

text4.position = c4.position;
var group4 = new Group([c4, text4]);
group4.data.id = 4;
var text5= new PointText(new Point(100, 100));
text5.fillColor = 'black';
text5.content= 'Circle 5';

var c5 = new Path.Circle({
    center: [445,505],
    radius: 110,
    //parent: originals,
    fillColor: 'white',
strokeColor: 'black'
});
c5.data.id=5;
text5.position = c5.position;
var group5 = new Group([c5, text5]);
group5.data.id=5;
var originals = new Group({
  children: [group1, group2, group3, group4, group5],
  insert: true
});


var regions12 = c1.intersect(c2);
console.log(regions12);
//regions12.parent = originals;
regions12.moveAbove(c1);
regions12.moveAbove(c2);
regions12.moveBelow(text1);
regions12.moveBelow(text2);
regions12.fillColor = 'purple';

var regions13 = c1.intersect(c3);
console.log(regions13);
regions13.moveAbove(c1);
regions13.moveAbove(c3);
regions13.moveBelow(text1);
regions13.moveBelow(text3);
regions13.fillColor = 'purple';

var regions14 = c1.intersect(c4);
console.log(regions14);
regions14.moveAbove(c1);
regions14.moveAbove(c4);
regions14.moveBelow(text1);
regions14.moveBelow(text4);
regions14.fillColor = 'purple';

var regions15 = c1.intersect(c5);
console.log(regions15);
regions15.moveAbove(c1);
regions15.moveAbove(c5);
regions15.moveBelow(text1);
regions15.moveBelow(text5);
regions15.fillColor = 'purple';
/*====================================*/
var regions23 = c2.intersect(c3);
console.log(regions23);
regions23.moveAbove(c2);
regions23.moveAbove(c3);
regions23.moveBelow(text2);
regions23.moveBelow(text3);
regions23.fillColor = 'purple';

var regions24 = c2.intersect(c4);
console.log(regions23);
regions24.moveAbove(c2);
regions24.moveAbove(c4);
regions24.moveBelow(text2);
regions24.moveBelow(text4);
regions24.fillColor = 'purple';

var regions25 = c2.intersect(c5);
console.log(regions23);
regions25.moveAbove(c2);
regions25.moveAbove(c5);
regions25.moveBelow(text2);
regions25.moveBelow(text5);
regions25.fillColor = 'purple';
/*===================================*/
var regions34 = c3.intersect(c4);
console.log(regions34);
regions34.moveAbove(c3);
regions34.moveAbove(c4);
regions34.moveBelow(text3);
regions34.moveBelow(text4);
regions34.fillColor = 'purple';

var regions35 = c3.intersect(c5);
console.log(regions34);
regions35.moveAbove(c3);
regions35.moveAbove(c5);
regions35.moveBelow(text3);
regions35.moveBelow(text5);
regions35.fillColor = 'purple';
/*==================================*/
var regions45 = c4.intersect(c5);
console.log(regions45);
regions45.moveAbove(c4);
regions45.moveAbove(c5);
regions45.moveBelow(text4);
regions45.moveBelow(text5);
regions45.fillColor = 'purple';

var activeItem; // need this to be global for now

var handle;

function onMouseDown(event) {
    handle = null;
    if(activeItem){
         handle = activeItem.hitTest(event.point, 
              {
                  segments: true,
              stroke: true,
              fill: true,
              tolerance: 5
              }
        );

           }
    var hitResult = originals.hitTest(event.point);
    activeItem = hitResult && hitResult.item;
    console.log(activeItem);
    if(activeItem){
      activeItem.selected = true;
      activeItem = activeItem.parent;
    } else {
        console.log('nothing hit');
        return;
    }
} 
var sgement;
function onMouseDrag(event) {
    if ( activeItem){
        console.log("=======");
        console.log(activeItem.position.x);
        console.log(activeItem.position.y);
        if(handle && (handle.type == 'stroke' || handle.type == 'segment')){
	    var p = event.point; // old
    var p2 = p + event.delta; // new
    console.log("p");
    console.log(p);
    console.log("p2");
    console.log(p2);
    var c = activeItem.position;
    console.log(c);
    console.log(c - p);
    console.log((c - p).length);
    if ((c - p).length > (c - p2).length){
      activeItem.scaling -= 0.005*event.delta.length;
    } else {
      activeItem.scaling += 0.005*event.delta.length;
    }
}
else {
    activeItem.translate(event.point - activeItem.position);
}
        if(regions12){
            regions12.remove();
            regions12 = c1.intersect(c2);
            regions12.moveAbove(c1);
            regions12.moveAbove(c2);
            regions12.moveBelow(text1);
            regions12.moveBelow(text2);
            regions12.fillColor = 'purple';
        }
     if(regions13){
            regions13.remove();
      regions13 = c1.intersect(c3);
            regions13.moveAbove(c1);
            regions13.moveAbove(c3);
            regions13.moveBelow(text1);
            regions13.moveBelow(text3);
            regions13.fillColor = 'purple';

        }
     if(regions14){
            regions14.remove();
      regions14 = c1.intersect(c4);
            regions14.moveAbove(c1);
            regions14.moveAbove(c4);
            regions14.moveBelow(text1);
            regions14.moveBelow(text4);
            regions14.fillColor = 'purple';

        }
    if(regions15){
            regions15.remove();
      regions15 = c1.intersect(c5);
            regions15.moveAbove(c1);
            regions15.moveAbove(c5);
            regions15.moveBelow(text1);
            regions15.moveBelow(text5);
            regions15.fillColor = 'purple';

        }

/*=====================================*/
    if(regions23){
            regions23.remove();
      regions23 = c2.intersect(c3);
            regions23.moveAbove(c2);
            regions23.moveAbove(c3);
            regions23.moveBelow(text2);
            regions23.moveBelow(text3);
            regions23.fillColor = 'purple';

        }
     if(regions24){
            regions24.remove();
      regions24 = c2.intersect(c4);
            regions24.moveAbove(c2);
            regions24.moveAbove(c4);
            regions24.moveBelow(text2);
            regions24.moveBelow(text4);
            regions24.fillColor = 'purple';

        }
    if(regions25){
            regions25.remove();
      regions25 = c2.intersect(c5);
            regions25.moveAbove(c2);
            regions25.moveAbove(c5);
            regions25.moveBelow(text2);
            regions25.moveBelow(text5);
            regions25.fillColor = 'purple';

        }
/*====================================*/
     if(regions34){
            regions34.remove();
      regions34 = c3.intersect(c4);
            regions34.moveAbove(c3);
            regions34.moveAbove(c4);
            regions34.moveBelow(text3);
            regions34.moveBelow(text4);
            regions34.fillColor = 'purple';

        }
    if(regions35){
            regions35.remove();
      regions35 = c3.intersect(c5);
            regions35.moveAbove(c3);
            regions35.moveAbove(c5);
            regions35.moveBelow(text3);
            regions35.moveBelow(text5);
            regions35.fillColor = 'purple';

        }
/*======================================*/
    if(regions45){
            regions45.remove();
      regions45 = c4.intersect(c5);
            regions45.moveAbove(c4);
            regions45.moveAbove(c5);
            regions45.moveBelow(text4);
            regions45.moveBelow(text5);
            regions45.fillColor = 'purple';

        }
  }
  }

  function onMouseUp(event){
          if (! regions12.isEmpty()){
            console.log(regions12);
            regions12.fillColor = "purple";
            console.log("there is an intersection between 1 and 2!");
          }

      }
var scope = this;				    
function changeColor(c){
  scope.activate();
  console.log(c);
  console.log(activeItem); // is defined above
  activeItem.fillColor = 'blue';
  activeItem.getItem()[0].setColor('blue');
  console.log(activeItem.getItem());
           activeItem.getItem()[1].setColor('black');
  canvas.renderAll();
}

window.changeColor = changeColor;


            var scope = this;				    
function changeColorR(c){
  scope.activate();
  console.log(c);
  console.log(activeItem);  console.log(activeItem);
  activeItem.fillColor = 'red';
  activeItem.getItems()[0].setColor('red');
  canvas.renderAll();
}

window.changeColorR = changeColorR;

            var scope = this;
            function changeStroke(){
            scope.activate();
            activeItem.dashArray = [10,4];
            }
            window.changeStroke = changeStroke;
              var scope = this;
            function changeStrokeBack(){
            scope.activate();
            activeItem.dashArray = false;
            }
            window.changeStrokeBack = changeStrokeBack;

                        var scope = this;				    
function changeColorBack(c){
  scope.activate();
  console.log(c);
  console.log(activeItem); // is defined above
  console.log(activeItem);
  activeItem.fillColor = 'white';
  activeItem.getItems()[0].setColor('white');
  canvas.renderAll();
}
window.changeColorBack = changeColorBack;

   var scope = this;
doSubmitOne = function(e){
scope.activate();
  e.preventDefault();
  // is the value inside the hidden input inside the submitted form
console.log(e.target);
  var targetName = document.getElementsByName("formOne")[0].value.toLowerCase();
  console.log(text1);
  console.log(targetName);
  // holds the user's text entry
  var text = e.target.getElementsByTagName("input")[0].value;
  console.log(text);
  console.log(text.value);
  var obj;
  var arr = [group1, group2, group3, group4, group5];
  for( i = 0; i < arr.length; i++){
    console.log(arr[i].type);
    if (arr[i].data.id == targetName){
      console.log("We found object with fill " + targetName);
      obj = arr[i];
    }
  }
  console.log(obj);
  var t = obj.getItem({
    _class: "PointText"
  });
  console.log(t);
  t.content = text;
  return false;
}
window.doSubmitOne = doSubmitOne;


   var scope = this;
doSubmitTwo = function(e){
scope.activate();
  e.preventDefault();
  // is the value inside the hidden input inside the submitted form
console.log(e.target);
  var targetName = document.getElementsByName("formTwo")[0].value.toLowerCase();
  console.log(text2);
  console.log(targetName);

  // holds the user's text entry
  var text = e.target.getElementsByTagName("input")[0].value;
  console.log(text);
  console.log(text.value);
  var obj;
  var arr = [group1, group2, group3, group4, group5];
  for( i = 0; i < arr.length; i++){
    console.log(arr[i].type);
    if (arr[i].data.id == targetName){
      console.log("We found object with fill " + targetName);
      obj = arr[i];
    }
  }
  console.log(obj);
  var t = obj.getItem({
    _class: "PointText"
  });
  console.log(t);
  t.content = text;
  return false;
}
window.doSubmitTwo = doSubmitTwo;

/***********************/
   var scope = this;
doSubmitThree = function(e){
scope.activate();
  e.preventDefault();
  // is the value inside the hidden input inside the submitted form
console.log(e.target);
  var targetName = document.getElementsByName("formThree")[0].value.toLowerCase();
  console.log(text3);
  console.log(targetName);
  // holds the user's text entry
  var text = e.target.getElementsByTagName("input")[0].value;
  console.log(text);
  console.log(text.value);
  var obj;
  var arr = [group1, group2, group3, group4, group5];
  for( i = 0; i < arr.length; i++){
    console.log(arr[i].type);
    if (arr[i].data.id == targetName){
      console.log("We found object with fill " + targetName);
      obj = arr[i];
    }
  }
  console.log(obj);
  var t = obj.getItem({
    _class: "PointText"
  });
  console.log(t);
                                    t.content = text;
                                    return false;
                                    }
                                    window.doSubmitThree = doSubmitThree;


                                    //submit four function


                                    var scope = this;
                                    doSubmitFour = function(e){
                                    scope.activate();
                                    e.preventDefault();
                                    // is the value inside the hidden input inside the submitted form
                                    console.log(e.target);
                                    var targetName = document.getElementsByName("formFour")[0].value.toLowerCase();
                                    console.log(text4);
                                    console.log(targetName);

                                    // holds the user's text entry
                                    var text = e.target.getElementsByTagName("input")[0].value;
                                    console.log(text);
                                    console.log(text.value);
                                    var obj;
                                    var arr = [group1, group2, group3, group4, group5];
                                    for( i = 0; i < arr.length; i++){
                                    console.log(arr[i].type);
                                    if (arr[i].data.id == targetName){
                                    console.log("We found object with fill " + targetName);
                                    obj = arr[i];
                                    }
                                    }
                                    console.log(obj);
                                    var t = obj.getItem({
                                    _class: "PointText"
                                    });
                                    console.log(t);
                                    t.content = text;
                                    return false;
                                    }
                                    window.doSubmitFour = doSubmitFour;
                                    //submit five function


var scope = this;
doSubmitFive = function(e){
scope.activate();
e.preventDefault();
// is the value inside the hidden input inside the submitted form
console.log(e.target);
var targetName = document.getElementsByName("formFive")[0].value.toLowerCase();
console.log(text5);
console.log(targetName);

// holds the user's text entry
                                    var text = e.target.getElementsByTagName("input")[0].value;
                                    console.log(text);
                                    console.log(text.value);
                                    var obj;
                                    var arr = [group1, group2, group3, group4, group5];
                                    for( i = 0; i < arr.length; i++){
                                    console.log(arr[i].type);
                                    if (arr[i].data.id == targetName){
                                    console.log("We found object with fill " + targetName);
                                    obj = arr[i];
                                    }
                                    }
                                    console.log(obj);
                                    var t = obj.getItem({
                                    _class: "PointText"
                                    });
                                    console.log(t);
                                    t.content = text;
                                    return false;
                                    }
                                    window.doSubmitFive = doSubmitFive;








