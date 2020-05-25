# Identity Mapping

## Current TODO

### 2/25 Meeting:
  - [ ] (!!!) *On the positioning page, when one circle is completely inside another (paperjs has a test for this- isAncestor), if they click that circle, make the click attach to the circle, not the intersection (outside-in)
    - Low priority for now
    - As a shim, add text to the user in the instructions to mention this awkward case
    
### 2/26 Meeting: (Maybe zoom call with Dr. Tomcho & Dr. Harris soon?)
  - [ ] Intersection questions -> likert scale questions
    - [ ] Necessary database updates
    - [ ] UI + backend updates
    - [ ] Questions:
      - Positive vs negative
      - TBD, from Dr. Tomcho
  - [ ] UI usability (notes), after intersection explations
  - [ ] Replace first page images with chart from (Martin Czellar, 2016) ?
    - re-create with fewer columns, no footnotes, etc.
    - original is done in LaTeX tables
    - remove "distance" row
  - [ ] Maybe change bg color to off-white to emphasize canvas element
  - [ ] find replacement for grace ( :( )
  
### 3/24 Meeting: 
  - [x] (IN PROGRESS) Position "Next" - submit data into JSON object -> database by writing PHP code for Laravel (associative array with AJAX request (example is inside layering.js))
    - ** We might want to rethink this, or at least, attach doSubmit to more than just "Next"
  
### 4/7 Meeting:
  - [ ] (IN PROGRESS) activeItem.fillcolor in extended.js logic extended to intersections through function.
        - [ ] Assuming this means having an AJAX submission for Intersections to DB
  - [x] (IN PROGRESS) "local storage" issue - Rewrite of doSubmit to AJAX?
  
### 5/19 Meeting:
  - [ ] revisit extended.js (especially intersection logic) for AJAX posting to DB 
        - Looked at extended.js: At start of extended.js, we want to check db for user's sessId & return the circles & intersections

## Fixed bugs:
  - [x] create sessionCheck middleware that checks if participant has a sessId already recorded in the db. If not, add them to db and launch start

