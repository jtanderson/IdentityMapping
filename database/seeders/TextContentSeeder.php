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
        DB::table('textcontent')->insert([
            [
                // [page]-[location]-[number]
                'key' => "start-top-1",
                'name' => 'Social Identity Description',
                'content' => "Psychologists distinguish between our personal identities and our social identities.  Personal identities involve descriptions of our self, <span style='color: red'>separate from others.</span>  
          Social identities involve descriptions of our bonds or <span style='color: red'>connections</span> with other people or groups. 
           Human beings are social creatures. We all have <span style='color: #ff0000'>connections or affiliations</span> with others.<br><br>",
                'description' =>
                    "Appears on the /start page below the banner, before the images",
            ],
            [
                'key' => "start-mid-2",
                'name' => 'Survey Description',
                'content' =>
                    "Social Identity Mapping is a tool that peple use to compare the data entered by the user to data of others. These are some examples of the possibilities that you can do with the circles. The goal is to layout the circles and name them in a way that fits you the best. The circles will appear on the screen one at a time in the order that you listed them. Every circle that appears on the map is to be moved to a region that you believe fits best. Once the circle has been placed you can drop the circle and change the size of the circle. The circles size are completely random therefore you will need to resize each circle to fit what describes you the best. In order to resize the circle you will have to click the circle that you want to change the size of and use the handles on the outer edge of the circle to click and drag to change the size of the selected circle.",
                'description' =>
                    "Appears in the middle of the /start page below the first paragraph and above the images",
            ],
            [
                'key' => 'position-top-1',
                'name' => 'Position Page Mapping Description',
                'content' =>
                    'This is the section where you choose the five social identities that are closest to you and map them onto the canvas where you see fit. To add social identities, simply type each one into the corresponding text box then click add circle. Once a circle has been added you can move them on the screen to be placed where you think they fit best.',
                'description' =>
                    "Appears under the header 'Map your Identities' on the position page",
            ],
            [
                'key' => 'color-top-1',
                'name' => 'Color Page Description',
                'content' =>
                    'This section is where you add some detail to your map. In this section you may add either a red color for a negative impact on your life. Or you may add the color blue to your circle meaning that this identity makes you content.',
                'description' =>
                    "Gives user a description of what the color of their circles could represent",
            ],
            [
                'key' => 'color-top-2',
                'name' => 'Color Page Functionality',
                'content' =>
                    'To add color to your circle, use the slider below the form where entering the circles identity. This slider starts at white then goes from red to purple to blue. To the right of the color slider are two radio buttons where you can select the outline of the circle to be either solid or a dotted outline to represent a "conflicted" relationship. After you input your five identities, you can choose the color of the intersecting cirles on the map using the "Intersection Slider".',
                'description' =>
                    "Gives user instructions on how to use the slider, buttons, and canvas on the page.",
            ],
            [
                'key' => 'description-top-1',
                'name' => 'Description Page Message',
                'content' =>
                    'Now that your map is complete, we are going to ask you some questions about your social identities. Please respond to the following questions thinking about each identity one at a time.',
                'description' =>
                    "Message that reminds user to answer questions for each identity.",
            ],
            [
                'key' => 'demographics-top-1',
                'name' => 'Demographics Page Description',
                'content' =>
                    'Please tell us about yourself now so that we can compare you to people that are related to you in demographics. This will help in determining who you associate with and who you are likely to associate with in the future. After filling this out you will be prompted to the end of the survey where you can submit all of your work for final comparison and the assignment will be completed.',
                'description' =>
                    "Informs the reader of the importance of demographics in this survey.",
            ],
            [
                'key' => 'activity-description',
                'name' => 'Activity Description',
                'content' => '<body>
          <h2>Title of Activity</h2>
          <p>
          Social Identity Mapping and attitudinal and knowledge correlates
          </p>
          <h2>Researchers & Affiliation, Statement of Purpose, Recruitment</h2>
          <p>
          This semester Drs.’ Harris, Tomcho, and Wang at Salisbury University, and
          Dr. Joe Anderson are conducting a non-research activity.
          </p>
          <h2>Statement of Purpose</h2>
          <p>
          The activity will examine individual differences in cognitive, emotional,
          attitudinal, and behavioral characteristics as they pertain to participant
          generated social identity maps.
          </p>
          <h2>Recruitment</h2>
          <p>
          We are asking you to participate in this activity because you are currently
          a student at Salisbury University.
          </p>
          <h2>Participation, Survey Duration, Research Procedures</h2>
          <p>
          Your participation is completely voluntary and your decision of whether or
          not to participate in this activity will have no impact on your grade in the
          course you are enrolled or your standing at Salisbury University. You are
          welcome to withdraw from this activity at any time.
          <span style="font-weight: bold;"
              >You must be 18 years of age or older to participate in this
              activity.</span
          >
          If you are under the age of 18, you are not able to participate in this
          activity and your information will not be used. Survey Duration. The survey
          activity will take place once during the semester, and the session will take
          30 to 60 minutes to complete.
          </p>
          <h2>Procedures</h2>
          <p>
          The activity will involve creating a social identity map and completing a
          battery of survey questions about cognitive, emotional, attitudinal, and
          behavioral characteristics as they pertain to you.
          </p>
          <h2>Risks and Benefits of Participation, Participant Risk</h2>
          <p>
          There is a risk of time investment in completing survey. However, the time
          investment is minimal and not likely to impose any hardship. Participant
          Benefits. Students who volunteer to participate in completing the activity
          mapping process and questionnaires will be offered extra credit. Students
          who want to receive extra-credit, but do not wish to participate in the
          mapping process and questionnaires portion of the activity will be offered
          an alternative writing activity with a comparable time component to
          complete. Students will receive extra credit for completion of the session.
          Participating students will receive benefits of extra-credit, improved
          awareness of their social identities inter-relationships, and insights into
          their own attitudes and knowledge of factors that may be associated with
          their social identities. Participating students also may increase their
          self-awareness of the role their social identities play in their lives.
          </p>
          <h2>
              Alternative Options, Protection of Anonymity & Confidentiality,
              Alternative Options for extra credit
          </h2>
          <p>
          You may complete an alternate writing assignment for the extra-credit. The
          writing assignment will have a comparable time commitment. This alternate
          writing assignment will involve writing about the nature of how one or more
          of your social identities relate to your learning of the course material in
          your current course. Protection of Anonymity and Confidentiality. There will
          be sessions held in a computer lab during which you will participate in this
          activity. You will need to sign a paper form (with the last 4 digits of your
          SU ID) to verify your participation in the activity. This paper form will
          not be associated with your responses in any way. You may leave any item on
          the questionnaires blank if you so choose. Data Use/Data anonymity &
          confidentiality Protection. The PI and Co-PI’s will minimize risks to your
          responses by storing all information on a secure, password-protected
          computer on Herokup.com’s secure server and on a password-protected computer
          on Salisbury University’s secure server. No identifying information will be
          included. Members of the research team will have access to the anonymous
          responses provided to evaluate the usability of the mapping software and to
          evaluate potential strategies for analyzing the responses.
          </p>
          <p>
          If you have any questions or concerns about this activity, please feel free
          to contact Dr. Tomcho (tjtomcho@salisbury.edu), Dr. Harris, or Dr. Wang.
          </p>
          <p>
          If you have any adverse effects or concerns about the activity research,
          please contact one of the investigators. This activity has received approval
          from the Salisbury University’s Dean of Research as a non-research activity.
          </p>
          <p>
          Thank you for your time and help in this activity
          </p>
          <p>
          Dr. Harris, Tomcho, Wang
          </p>
          <p>
          By clicking next I:
          </p>
          <p>
          Acknowledge that I am 18 years of age or older
          </p>
          <p>
          I consent and agree to allow Drs\'. Harris, Tomcho, Wang to include my
          anonymized questionnaires and mapping (please check all that apply) and I
          consent to the collection of:
          </p>
          <p>
          ______ anonymized questionnaires and mapping
          </p>
          <p>
          I understand that I may ask to have my responses withdrawn from the activity
          at any time by emailing Dr. Thomas Tomcho (tjtomcho@salisbury.edu), or Dr.
          Harris or Dr. Wang and that my decision to withdraw from the study will not
          impact my grade in the course or my standing at Salisbury University.
          </p>
      </body>
      ',
                'description' =>
                    "Informs the participant of the activity description.",
            ],
            [
                'key' => "user-experience-top-1",
                'name' => 'User Experience',
                'content' => 'A few questions on how you enjoyed using the mapping tool on the previous pages.',
                'description' => "Informs the participant on the user experience survey",
            ]
        ]);
    }
}
