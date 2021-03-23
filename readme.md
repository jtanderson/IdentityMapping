# Identity Mapping

## Current TODO

-   Odd # of survey questions, card layout issues on /identityDebrief need to be fixed

-   From Dr. Harris:
    -   Graphics on intro page - people misspelled, text labels too small in circles
    -   Page 2: Text labels not centered in circle, difficult to grab circle edge to resize, Maybe change Abort to Stop or Quit,
    -   Page 3: Forced intersection separation, desired? when I clicked to color a circle, I thought I'd selected a whole circle but shading only filled the intersection that was really what was selected. I know this is part of the point but, in my mind, it would be easier on the user to assign colors to the circles before dealing with transitions associated with overlaps/intersections. It's not too big a deal, the user like me will figure it out very quickly, but if there are a lot of intersections in their configurations, this may be off-putting with lots of small slivers.
    -   Add textbox for feedback at `/end`
-   [ ] \*\*On the positioning page, when one circle is completely inside another (paperjs has a test for this- isAncestor), if they click that circle, make the click attach to the circle, not the intersection (outside-in)
    -   Low priority for now
    -   As a shim, add text to the user in the instructions to mention this awkward case
-   **ADMIN INTERFACE**
    -   Changing degrees of surveyquestion doesn't update
    -   Allow creation of new survey questions
    -   Allow add/edit/remove categories
    -   Add some pre-defined reports and data export
    -   Add some dashboard-style visualization of current data
        -   Number of participants, number finished
        -   Number of circles/identities, basic stats
        -   Timing data

## 02/11/2021 Check-In

-   Created new VueJS component
    This component takes care of the input from the admin in order to change the text on each page

-   Added margin between the edit & remove button in the SurveyQuestion section of the admin page

## 02/18/2021 Check-In

-   Convertd the QuillJS CDN to work now independently using NPM package so that we do not have to rely on a CDN that has the possibility of failing or going down, rendering our application useless.

## 03/04/2021 Check-In

-   Added button on admin interface to route the user to the text content page [still to be finished]
-   Added newer pictures to the /start page
-   Changed the Abort button on each of the pages to 'Restart'
-   Went from 2 nicer pictures instead of 3 semi-ok pictures [need approval / feedback]
-   Added rainbow background to the header of the start page [need approval / feedback]
-   Added space between input and 'Add Circle' button on the /position page
-   Added space between the radio button cards on /identityDebrief

1. Proper containment -> Meaning one within another
2. At least one where you can color the intersection

## TODO

-   The /color bar under the active item color, make that start in the middle and not have a circle, but just a bar
-   Button to go back from /admin/content to /admin
-   Button to go from /admin to /start

-   Confirmation of save on /admin/content
