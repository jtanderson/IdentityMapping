# Identity Mapping 

## Current TODO

  - Odd # of survey questions, card layout issues on /identityDebrief need to be fixed
    
  - From Dr. Harris:
    - Graphics on intro page - people misspelled,  text labels too small in circles
    - Page 2: Text labels not centered in circle, difficult to grab circle edge to resize, Maybe change Abort to Stop or Quit, 
    - Page 3: Forced intersection separation, desired?  when I clicked to color a circle, I thought I'd selected a whole circle but shading only filled the intersection that was really what was selected. I know this is part of the point but, in my mind, it would be easier on the user to assign colors to the circles before dealing with transitions associated with overlaps/intersections. It's not too big a deal, the user like me will figure it out very quickly, but if there are a lot of intersections in their configurations, this may be off-putting with lots of small slivers. 
    - Add textbox for feedback at `/end`
  - [ ] **On the positioning page, when one circle is completely inside another (paperjs has a test for this- isAncestor), if they click that circle, make the click attach to the circle, not the intersection (outside-in)
    - Low priority for now
    - As a shim, add text to the user in the instructions to mention this awkward case
  - **ADMIN INTERFACE**
    - Changing degrees of surveyquestion doesn't update
    - Allow creation of new survey questions
    - Allow add/edit/remove categories
    - Add some pre-defined reports and data export
    - Add some dashboard-style visualization of current data
        - Number of participants, number finished
        - Number of circles/identities, basic stats
        - Timing data
 
