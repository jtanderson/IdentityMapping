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
                        <tr v-for="question in questions" :key="question.id">
                          <td>{{ question.text }}</td>
                          <td>{{ question.degrees }}</td>
                          <td>{{ question.extreme_left }}</td>
                          <td>{{ question.extreme_right }}</td>
                          <td>{{ question.surveyable_type }}</td>
                          <td></td>
                        </tr>
                      </tbody>
                    </table>
                  </div>
              </div>
          </div>
      </div>
</template>

<script>
    export default {
        data() {
          return {
            questions: []
          }
        },
        created() {
          axios
            .get("/admin/surveyquestions")
            .then(response => {
              this.questions = response.data;
              console.log("HERE");
              console.log(response.data);
            });
        }
    }
</script>
