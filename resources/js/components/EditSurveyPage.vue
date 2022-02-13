<template>
  <div>
    <div class="form-group row">
      <label for="inputHeader" class="col-sm-4 col-form-label"
        >Priming Page Header</label
      >
      <div class="col-sm-10">
        <input
          type="text"
          class="form-control"
          id="inputHeader"
          v-model="page_d.header"
        />
      </div>
    </div>
    <div class="form-group row">
      <label for="inputPassword3" class="col-sm-4 col-form-label"
        >Priming Page Description</label
      >
      <div class="col-sm-10">
        <textarea
          rows="3"
          type="text"
          class="form-control"
          v-model="page_d.description"
        />
      </div>
    </div>
    <div class="form-group row">
      <div class="col-sm-10">
        <button
          type="submit"
          class="btn btn-primary"
          v-on:click="updateSurveyPage"
        >
          Update
        </button>
      </div>
    </div>
  </div>
</template>
<script>
export default {
  name: "EditSurveyPage",
  props: ["page"],
  mounted() {
    console.log(this.page);
  },
  data() {
    return {
      page_d: this.page,
      //   header: this.page.header,
      //   description: this.page.description,
    };
  },
  methods: {
    updateSurveyPage() {
      console.log("LOL");
      //   await axios
      //     .post(`/admin/updateSurveyPage/${this.page.order}`, {
      //       header: this.header,
      //       description: this.description,
      //       order: this.page.order,
      //     })
      //     .then((res) => {
      //       this.header = res.data.header;
      //       this.description = res.data.description;
      //       alert("Update successful");
      //     });
    },
  },
};
</script>
