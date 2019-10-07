# Identity Mapping

## Current TODO

### 9/9 Meeting:
  - [ ] The "description" page loads five Likert scales, regardless of total number of circles
    - [x] Same issue with "Categorize your identities"
  - [ ] going back to initialMapping should populate the old circles, if they exist
  - [ ] start recording *EVERY* user-interface event into an object in localStorage (will be written out to the database later)
## Fixed bugs
  - [x] On "extended" page, when user clicks circle, adjust slider and boundary radio to reflect the current values of that active item (Grace)
  - [x] After the user goes back, need to clear the localStorage of the old circle data (after they move back forward)
  - [x] All links should assume https (for now)
  - [x] Remove "submit" from "Description" page, use "Next" button to save the data
- [x] Do not user browser "back" and "forward" features in javascript :) Hard-code the links instead...
 - [x] use the stored circle data to show only questions for the existing intersections, ideally also display (only) the involved circles with the chosen colors and style (so this will be a javascript operation that loops the intersections and generates some html for each one) (Sam)
   - [x] (8/7 meeting fix)Allow for user to go back to initial mapping and make changes
   - [x] Edit HTML/CSS for better interface when rescaling
   - [x] Include one separate question above that asks to describe the overall “nature” of the intersection (e.g. emotional, behavioral, time spent, etc.)
   - [x] after the user colors circles and intersections, display a page that asks them to interpret each intersection
   - [x] After the entire survey, add a page for the user to categorize the label of each circle (according to some set of categories we’ll get from Dr. Tomcho). These options can just be placeholders for now, though.
   - [x] (Grace) update the slider and boundary selector to reflect current values when an object is selected
  - [x] (Sam) remember last color used for each intersection
  - [x] (Sam) use localstorage to persist circles from initial to extended mapping pages
    - [x] Possbily break up .js into multiple files (but keep it DRY)
    - [x] initial mapping does not allow color, only names and size and position
    - [x] extended mapping should *not* allow movement, renaming, or resizing. but only coloring 
  - [x] (Sam) clean up boostrap and other lib dependencies
  - [x] (ALL) Keep testing cross browser compatability i.e. chrome vs. firefox vs. IE/Edge
  - [x] (Sam) Try fixing intersection layer problem by putting 5-way first in layer child array, 4-way second, 3-way third, etc...
  - [x] Add five-way intersection where appropriate (fixLayers, intersections, etc.)
  - [x] When adding a new circle, fix delete+recreate intersection logic
  - [x] Fix "activeItem is null" error in mouse drag function
  - [x] FixIntersection function to do layering of the intersections
  - [x] use paper API to implement the "reset" button
  - [x] Don't do anything with intersections when mouse events do not involve any circles
  - [x] don't re-calculate intersections on every drag
  - [x] Circle text can be dragged on intersections layer
  - [x] object outlines (solid, dotted) cannot make two dotted in a row since already selected on screen
  - [x] Add debug mode for turning logs on or off
  - [x] Try to put as much info into a database like log/ local storage
  - [x] Reset button to reset canvas i.e wrap circle creation into another function

