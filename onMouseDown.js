function onMouseDown(event) {
    dragged = false;
    handle = null;
    //making sure we de select everything
    if(activeItem != null){
        for(var c in activeItem.children){
            activeItem.children[c].selected = false;
        }
        activeItem.selected = false;
    }
    var hitResult = groups.hitTest(event.point);
    //if we hit something
    if(hitResult != null){
        console.log("We have hit something");
        console.log(activeItem.children);

        activeItem = hitResult && hitResult.item;
        activeItem.selected = true;
        if(activeItem.isIntersection){
            activeItem = activeItem.parent;

        }

    }

    



//original messy version

    function onMouseDown(event) {
        dragged = false;
        handle = null;
        if (activeItem) {
      
          handle = activeItem.hitTest(event.point, 
            {
              segments: true,
              stroke: true,
              fill: true,
              tolerance: 5
            }
          );
        }
      
        var hitResult = groups.hitTest(event.point);
      
        if(activeItem){
          if(activeItem != null){ // why?
            console.log("Active item has children:");
            console.log(activeItem.children);
      
            if(activeItem.isIntersection == undefined){
              for(var c in activeItem.children){
                activeItem.children[c].selected = false;
              }
            } else {
              activeItem.selected = false;
            }
          }
        }
        activeItem = hitResult && hitResult.item;
        if(activeItem != null){
          console.log(activeItem);
        }
        if(activeItem){
          activeItem.selected = true;
          if(activeItem.isIntersection == undefined){
            activeItem = activeItem.parent;
          }
        } else {
          console.log('nothing hit');
          return;
        }
      
        for (var _int in intersections){
          if(!intersections[_int].selected){
            intersections[_int].remove();
          }
        }
      
      } 