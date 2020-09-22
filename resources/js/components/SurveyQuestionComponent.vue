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
                      <button class="btn btn-primary" @click="newSurveyQuestion()">New</button>
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
            question.mode = "surveyquestionedit";
          },
          saveSurveyQuestion(question) {
            axios
              .post('/admin/updateSurveyQuestion/'+question.id, {
                text: question.text,
                degress: question.degrees,
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
