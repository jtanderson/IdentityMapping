# Identity Mapping

## Current TODO

### 7/17 Meeting:

  - [ ] (CURRENT BUG) Cross browser compatability i.e. chrome
  - [ ] Add five-way intersection where appropriate (fixLayers, intersections, etc.)
  - [ ] When adding a new circle, fix delete+recreate intersection logic
  - [ ] (Sam) Try fixing intersection layer problem by putting 5-way first in layer child array, 4-way second, 3-way third, etc...
  - [ ] (Grace) use localstorage to persist circles from initial to extended mapping pages
    - [ ] initial mapping does not allow color, only names and size and position
    - [ ] extended mapping should *not* allow movement, renaming, or resizing. but only coloring

## Fixed bugs

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

