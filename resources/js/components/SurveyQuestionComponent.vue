<template>
      <div class="row justify-content-center">
          <div class="col-md-12">
              <div class="card">
                  <div class="card-header">Survey Questions</div>

                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Text</th>
                          <th># Degrees</th>
                          <th>Left Extreme</th>
                          <th>Right Extreme</th>
                          <th>Applies To</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <component
                          v-for="question in questions"
                          v-bind:is="question.mode"
                          v-bind:key="question.id"
                          v-bind:question="question"
                          v-on:edit="editSurveyQuestion"
                          v-on:save="saveSurveyQuestion"
                          v-on:delete="removeSurveyQuestion"
                        ></component>
                      </tbody>
                    </table>
                    <div class="btn-group">
                      <button class="btn btn-primary" v-on:click="newSurveyQuestion">New</button>
                    </div>
                  </div>
              </div>
          </div>
      </div>
</template>

<script>
    export default {
        data() {
          return {
            questions: [],
          }
        },

        // Does this happen on page load or re-render?
        // When does this happen
        created() {
          axios
            .get("/admin/surveyquestions")
            .then(response => {
              for(var i=0; i<response.data.length; i++){
                response.data[i].mode = 'surveyquestioninfo'
              }
              this.questions = response.data;
            });
        },
        methods: {


          editSurveyQuestion(question) {
            console.log("in edit", question);
            console.log("editing")
            question.mode = "surveyquestionedit";
            
          },


          newSurveyQuestion() {
            // idk if this a sufficient way to get the next id, it seems to give some problems when editing the newly added questions and trying to save it 
            // let nextID = (this.questions[this.questions.length - 1].id) + 1;
            // console.log("QUESTIONS", this.questions);
            // console.log("NEXTID", nextID);
            // axios
            //   .post('/admin/newSurveyQuestion', {
            //     text: 'edit me',
            //     degrees: '0',
            //     extreme_left: 'edit me',
            //     extreme_right: 'edit me',
            //     surveyable_type: 'edit me',
            //   })
            //   .then(response => {
            //     console.log(response.data);
            //     this.questions.push(response.data); // pushing the response.data "question" to the questions array here in vue
            //     console.log(this.questions);
            //     this.questions[this.questions.length - 1].mode = "surveyquestionedit"; // Setting the newly pushed question to have be in question edit mode
            //   });

            // soft add to the frontend
            var dataToPost = {
                text: 'edit me',
                degrees: '0',
                extreme_left: 'edit me',
                extreme_right: 'edit me',
                surveyable_type: 'edit me',
                id: 0,
            }

            dataToPost.mode = "surveyquestionedit"; // not part of db object

            this.questions.push(dataToPost);

            console.log(this.questions);

          },

          
          async saveSurveyQuestion(question) {
            console.log("BEFORE THEN", question.id);
            await axios
              .post('/admin/updateSurveyQuestion/'+question.id, {
                text: question.text,
                degrees: question.degrees, // typo on this line makes degrees default to 5. This was degress, should be degrees??
                extreme_left: question.extreme_left,
                extreme_right: question.extreme_right,
                surveyable_type: question.surveyable_type
              })
              .then(response => {

                console.log("IN THEN", question);   
                
                // Better way to do this...
                question.id = response.data.id;
                question.text = response.data.text;
                question.degrees = response.data.degrees;
                question.extreme_left = response.data.extreme_left;
                question.extreme_right = response.data.extreme_right;
                question.surveyable_type = response.data.surveyable_type;
                question.mode = "surveyquestioninfo";
               
                console.log("IN THEN 2", question.mode);   
                        
              });

            console.log("AFTER THEN", question.id);

            console.log("in save", question);
            
            // question.mode = "surveyquestioninfo";
          },


          removeSurveyQuestion(id) {
            axios
              .delete('/admin/removeSurveyQuestion/'+id)
              .then(response => {
                let i = this.questions.map(item => item.id).indexOf(id); // find index of your object
                this.questions.splice(i, 1);
              });
          }


        }
    }
</script>
