<template>
      <div class="row justify-content-center">
          <div class="col-md-4">
              <div class="card">
                  <div class="card-header">Categories</div>

                  <div class="card-body">
                    <table class="table table-bordered">
                      <thead>
                        <tr>
                          <th>Text</th>
                          <th>Actions</th>
                        </tr>
                      </thead>
                      <tbody>
                        <component
                          v-for="category in categories"
                          v-bind:is="category.mode"
                          v-bind:key="category.id"
                          v-bind:category="category"
                          v-on:edit="editCategory"
                          v-on:save="saveCategory"
                          v-on:delete="removeCategory"
                        ></component>
                      </tbody>
                    </table>
                    <div class="btn-group">
                      <button class="btn btn-primary" v-on:click="newCategory">New</button>
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
            categories: [],
          }
        },

        created() {
          axios
            .get("/admin/getcategories")
            .then(response => {
              for(var i=0; i<response.data.length; i++){
                response.data[i].mode = 'categoryinfo'
              }
              this.categories= response.data;
            });
        },
        methods: {


          editCategory(category) {
            category.mode = "categoryedit";
          },


          newCategory() {
            // soft add to the frontend
            let dataToPost = {
              name: 'edit me',
              id: 0,
            }

            dataToPost.mode = "categoryedit"; // not part of db object

            this.categories.push(dataToPost);

          },

          
          async saveCategory(category) {
            await axios
              .post('/admin/updateCategory/'+category.id, {
                name: category.name,
              })
              .then(response => {
                category.id = response.data.id;
                category.name = response.data.name;
                category.mode = "categoryinfo";
              });
          },


          removeCategory(id) {
            axios
              .delete('/admin/removeCategory/'+id)
              .then(response => {
                let i = this.categories.map(item => item.id).indexOf(id); // find index of your object
                this.categories.splice(i, 1);
              });
          }


        }
    }
</script>
