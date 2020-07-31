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
    
### 7/28 Meeting:
- [ ] (IN PROGRESS) saveIntersect for Circles class - returning intersections for extended page
    - Current issue: How to find # of intersections visibile? 
- [ ] (In progress) Abort button should delete entire participant & their data (W/ WARNING!) - 
    - Add function to SurveyController (go into DB, find participant by id, and then delete p at that id)
- [ ] Remove abort button on `/start` page
    - why is this not effin' working... put in a if/esle statement & still not working
- [ ] (This week) Refactor /survey, /category
- [ ] Seed data with laravel - data that always seed (admin, user acct.) in our case, survey questions... (pull Q from database automatically)
- [ ] Admin page where Admins could add in questions (so admin view to do this)
      - Add/remove survey questions... (to DB and then choose which ones to use?)
- [ ] build in data analytics view? 

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
- [x] (2) DB intersection migration 
   - add id1-5 & make them intersection
- [x] (1) We create new circles with saveCircle - using numbers aren't right - saveCircles before saveIntersections
- [x] saveIntersect should be in success callback for saveCircle **makes sure it is called directly after AJAX call
- [x] (1) Fix circle color (7/20) 
- [x] /category "@ensection" 
- [x] (IN PROGRESS) Circle ID saved in saveIntersect is not the dbid for the circle. - (2) find most recent circle with $participant (check SurveyController comments)
   - [x] (7/13) save area correctly 
- [x] Null check on color & linestyle in controller (make sure works)
- [x] if select canvas ("Nothing hit") - will break the doc.getElementById() 
    - [x] prevent function from running/nullity check -> added if/else statement
- [x] Admin/Authentication new controller, views, etc.
- [x] Should returning to /layering have color? (Assumed yes)
    - ERROR on saveCircle on extended, activeItem.data.id is undefined now
- [x] /end page has "Next" button 
    - Take the directional stuff out of @end (no need for Abort or Next)
