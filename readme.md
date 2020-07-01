# Identity Mapping 

## Current TODO

### 2/25 Meeting:
  - [ ] **On the positioning page, when one circle is completely inside another (paperjs has a test for this- isAncestor), if they click that circle, make the click attach to the circle, not the intersection (outside-in)
    - Low priority for now
    - As a shim, add text to the user in the instructions to mention this awkward case
    
### 2/26 Meeting: 
  - [ ] Intersection questions -> likert scale questions
    - [ ] Questions:
      - Positive vs negative
      - TBD, from Dr. Tomcho
  - [ ] Maybe change bg color to off-white to emphasize canvas element
  - [ ] find replacement for grace ( :( )
   
### 6/23 Meeting: 
- [ ] (3) Abort button should delete entire participant & their data (W/ WARNING!) - (go into DB, find participant by id, and then delete p at that id)
    - [ ] Remove abort button on `/start` page - (will need to remove the template from start -- where did we put the @yield stuff??)

### 7/1 Meeting:
Write a AJAX function for intersection
- [ ] (1) onMouseUp 
    - after circle has moved
    - on circle's circleID
     - check all int which include that circleID
     - send all ints to DB as array
     
- [ ] (2) DB intersection migration 
   - add id1-5 & make them intersection

## Fixed bugs:
  - [x] create sessionCheck middleware that checks if participant has a sessId already recorded in the db. If not, add them to db and launch start
  - [x] "local storage" issue - Rewrite of doSubmit to AJAX?
  - [x] Make category_id nullable (find migration to do so)
  - [x] AJAX post in layering is null when sent to controller (Anderson fixed)
  - [x] circleID starts at 2 - blade templating issue (even though it starts at 1...?) (Anderson fixed)
  - [x] session()->exists - check if participant needs to be added at all (SessionCheck does this)
    - [ ] Also consider session time, what if same session token is used?
  - [x] Detangle rest of local storage logic in JS.
  - [x] (IN PROGRESS) layering.js... we need to fill an object (5 times) with hidden input data and 
- [x] Retrieving hidden data from HTML & recreating circles:
    - [x] Create a circle into the paper.js view 
- [x] session()->get('participant_id') isn't seen by controller as object, instead as a number so it can't use it to getCircles()
- [x] Create circles after doSubmit (how did we do this before?, calling recreate()?)
- [x] (IN PROGRESS) Position "Next" - submit data into JSON object -> database by writing PHP code for Laravel (associative array with AJAX request (example is inside layering.js))
- [x] (2) Return the circles on color()
- [x] (1!) saveCircleData should be on every user action
