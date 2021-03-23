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
          'name' => 'Start Page Paragraph 1',
          'content' => "Psychologists distinguish between our personal identities and our social identities.  Personal identities involve descriptions of our self, <span style='color: red'>separate from others.</span>  
          Social identities involve descriptions of our bonds or <span style='color: red'>connections</span> with other people or groups. 
           Human beings are social creatures. We all have <span style='color: #ff0000'>connections or affiliations</span> with others.<br><br>",
          'description' => "Appears on the /start page below the banner, before the images",
        ],
        [
          'key' => "start-mid-2",
          'name' => 'Start Page Paragraph 2',
          'content' => "Social Identity Mapping is a tool that peple use to compare the data entered by the user to data of others. These are some examples of the possibilities that you can do with the circles. The goal is to layout the circles and name them in a way that fits you the best. The circles will appear on the screen one at a time in the order that you listed them. Every circle that appears on the map is to be moved to a region that you believe fits best. Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are completely random therefore you will need to resize each circle to fit what describes you the best. In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.",
          'description' => "Appears in the middle of the page below the first paragraph and above the images",
        ],
        [
          'key' => 'position-top-1',
          'name' => 'Position Page Mapping Description',
          'content' => 'This is the section where you choose the five social identities that are closest to you and map them onto the canvas where you see fit. To add social identities, simply type each one into the corresponding text box then click add circle. Once a circle has been added you can move them on the screen to be placed where you think they fit best.',
          'description' => "Appears under the header 'Map your Identities' on the position page",
        ],

        // Need to add the rest of the text here
      ]);
  }
}
