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
            console.log("editing")
            question.mode = "surveyquestionedit";
            
          },
          newSurveyQuestion() {
            // idk if this a sufficient way to get the next id, it seems to give some problems when editing the newly added questions and trying to save it 
            // let nextID = (this.questions[this.questions.length - 1].id) + 1;
            // console.log("QUESTIONS", this.questions);
            // console.log("NEXTID", nextID);
            axios
              .post('/admin/newSurveyQuestion', {
                text: 'edit me',
                degrees: '0',
                extreme_left: 'edit me',
                extreme_right: 'edit me',
                surveyable_type: 'edit me',
              })
              .then(response => {
                console.log(response.data);
                this.questions.push(response.data);
                console.log(this.questions);
                this.questions[this.questions.length - 1].mode = "surveyquestionedit";
              });
          },

          
          saveSurveyQuestion(question) {
            axios
              .post('/admin/updateSurveyQuestion/'+question.id, {
                text: question.text,
                degrees: question.degrees, // typo on this line makes degrees default to 5. This was degress, should be degrees??
                extreme_left: question.extreme_left,
                extreme_right: question.extreme_right,
                surveyable_type: question.surveyable_type
              })
              .then(response => {
                question = response.data;
              });
            question.mode = "surveyquestioninfo";
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
