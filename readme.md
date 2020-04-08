# Identity Mapping

## Current TODO

### 2/25 Meeting:
  - [ ] On the positioning page, when one circle is completely inside another (paperjs has a test for this- isAncestor), if they click that circle, make the click attach to the circle, not the intersection (outside-in)
    - Low priority for now
    - As a shim, add text to the user in the instructions to mention this awkward case
    
### 2/26 Meeting:
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
  - [ ] Position "Next" - submit data into JSON object -> database by writing PHP code for Laravel (associative array with AJAX request (example is inside layering.js))
  
### 4/7 Meetng:
  - [ ] activeItem.fillcolor in extended.js logic extended to intersections through function.
  - [ ] "local storage" issue - Rewrite of doSubmit to AJAX?
  
## Fixed bugs:
  - [x] *Survey for how the user feels about the interface* - needs more questions
  - [x] Only allow ages 18+ in dropdowns
  - [x] Change final "next" button to be "finish"
  - [x] Clean up web application on Laravel
  - [x] Double check web routes (are all surveys in there?)
  - [x] Move demographics after categorize
  - [x] Intersection survey table migration made
  - [x] Remove javascript from views, use laravel templating to loop with data pulled from DB
  - [x] Specific ages (need validation)
  - [x] Move circle text from 0,0 to center of circle 
  - [x] Extra de-briefing questions
    - Major (demographics)
    - Year (demographics)
    - 12-19 in the (Kim, 2001) table, visualization section (after or with categorization)

