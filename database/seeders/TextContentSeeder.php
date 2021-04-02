<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class TextContentSeeder extends Seeder
{
  /**
   * Run the database seeds.
   *
   * @return void
   */
  public function run()
  {
    DB::table('textcontent')->insert(
      [
        [ 
          // [page]-[location]-[number]
          'key' => "start-top-1",
          'name' => 'Social Identity Description',
          'content' => "Psychologists distinguish between our personal identities and our social identities.  Personal identities involve descriptions of our self, <span style='color: red'>separate from others.</span>  
          Social identities involve descriptions of our bonds or <span style='color: red'>connections</span> with other people or groups. 
           Human beings are social creatures. We all have <span style='color: #ff0000'>connections or affiliations</span> with others.<br><br>",
          'description' => "Appears on the /start page below the banner, before the images",
        ],
        [
          'key' => "start-mid-2",
          'name' => 'Survey Description',
          'content' => "Social Identity Mapping is a tool that peple use to compare the data entered by the user to data of others. These are some examples of the possibilities that you can do with the circles. The goal is to layout the circles and name them in a way that fits you the best. The circles will appear on the screen one at a time in the order that you listed them. Every circle that appears on the map is to be moved to a region that you believe fits best. Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are completely random therefore you will need to resize each circle to fit what describes you the best. In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.",
          'description' => "Appears in the middle of the /start page below the first paragraph and above the images",
        ],
        [
          'key' => 'position-top-1',
          'name' => 'Position Page Mapping Description',
          'content' => 'This is the section where you choose the five social identities that are closest to you and map them onto the canvas where you see fit. To add social identities, simply type each one into the corresponding text box then click add circle. Once a circle has been added you can move them on the screen to be placed where you think they fit best.',
          'description' => "Appears under the header 'Map your Identities' on the position page",
        ],
        [
          'key' => 'color-top-1',
          'name' => 'Color Page Description',
          'content' => 'This section is where you add some detail to your map. In this section you may add either a red color for a negative impact on your life. Or you may add the color blue to your circle meaning that this identity makes you content.',
          'description' => "Gives user a description of what the color of their circles could represent",
        ],
        [
          'key' => 'color-top-2',
          'name' => 'Color Page Functionality',
          'content' => 'To add color to your circle, use the slider below the form where entering the circles identity. This slider starts at white then goes from red to purple to blue. To the right of the color slider are two radio buttons where you can select the outline of the circle to be either solid or a dotted outline to represent a "conflicted" relationship. After you input your five identities, you can choose the color of the intersecting cirles on the map using the "Intersection Slider".',
          'description' => "Gives user instructions on how to use the slider, buttons, and canvas on the page.",
        ],
        [
          'key' => 'description-top-1',
          'name' => 'Description Page Message',
          'content' => 'Now that your map is complete, we are going to ask you some questions about your social identities. Please respond to the following questions thinking about each identity one at a time.',
          'description' => "Message that reminds user to answer questions for each identity.",
        ],
        [
          'key' => 'demographics-top-1',
          'name' => 'Demographics Page Description',
          'content' => 'Please tell us aboiut yourself now so that we can compare you to people that are related to you in demographics. This will help in determining who you associate with and who you are likely to associate with in the future. After filling this out you will be prompted to the end of the survey where you can submit all of your work for final comparison and the assignment will be completed.',
          'description' => "Informs the reader of the importance of demographics in this survey.",
        ],

        // Need to add the rest of the text here
      ]);
  }
}
