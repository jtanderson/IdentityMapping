<template>
  <tr>
    <td>
      <textarea type="text" v-bind:id="question.id+'-text'" v-model="question.text" style="width: 100%;"></textarea>
    </td>
    <td>
      <input type="number" v-bind:id="question.id+'-degrees'" v-model="question.degrees" style="width: 4em;"/>
    </td>
    <td>
      <input type="text" v-bind:id="question.id+'-extreme_left'" v-model="question.extreme_left"/>
    </td>
    <td>
      <input type="text" v-bind:id="question.id+'-extreme_right'" v-model="question.extreme_right"/>
    </td>
    <td>
      <select v-bind:id="question.id+'-surveyable_type'" v-model="question.surveyable_type">
        <option value="circle">Circles</option>
        <option value="intersection">Intersection</option>
        <option value="participant">Participant</option>
      </select>
    </td>
    <td>
      <div class="btn-group" role="group">
        <button class="btn btn-primary" @click="$emit('save', question)">Save</button>
      </div>
    </td>
  </tr>
</template>

<script>
  export default {
    props: ['question']
  }
</script>
