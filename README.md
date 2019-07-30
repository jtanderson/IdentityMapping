# Identity Mapping

## Current TODO

### 7/17 Meeting:
  - [ ] (Grace) update the slider and boundary selector to reflect current values when an object is selected
	- [ ] Figure out how JS retrieves information from objects-private variables?
	- [ ] Allow for user to go back to initial mapping and make changes
  - [ ] (Grace) Edit HTML/CSS for better interface when rescaling
  - [ ] Investigate using JS-backed database stores for data (e.g. firebase, mongoDB, pouchDB, couchDB)

## Fixed bugs
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

