

<template>
   <div>
   
     <form @submit.prevent="createCategory">
       <div class="create-categories-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newCategoryName" type="text" class="form-control" placeholder="Category Name" />
              
                <div class="input-group-append">
                <span class="input-group-text">Parent</span>
                </div>
                 <div class="input-group-prepend">
                <select v-model="newCategoryParent" class="form-control">
                <option disabled value="">Please select one</option>
                <option v-for="CateParent in categories" :key="CateParent.id" v-bind:value="CateParent.id">{{CateParent.name}}</option>                            
                 </select>
                 </div>

         <div class="input-group-append">
                    <button class="btn btn-primary"> Create</button>
                </div>

     </div>
     </form>
      <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>Id</th>
                <th>Category Name</th>
                <th>Parent</th>
                <th> Option </th>
            </thead>
            <tbody>
                <tr v-for="row in categories" :key="row.id">
                    <td>{{ row.id }}</td>
                    <td>{{ row.name }}</td>
                    <td>{{ row.parent ? row.parent.name:'' }} </td>
                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteCategories(row.id)"><i class="fa fa-times" /> Delete</button></td>
                </tr>
            </tbody>
        </table>





   </div>

</template>

<script>
import axios from 'axios';

export default {
    data() {
        return{
         categories:  [],
         newCategoryName: '',
         newCategoryParent: ''
        };
    },
    mounted() {
       this.getCategories();
    },

    methods: {
       getCategories(){
          return axios.get('/api/categories')
            .then(response => {
                this.categories = response.data;
            }).catch(console.error);
       },
       createCategory(){
          return axios.post('/api/categories', {
                      name: this.newCategoryName,
                      parent_id: this.newCategoryParent })
                .then(this.getCategories)
                .then(() =>{
                    this.newCategoryName= '';
                    this.newCategoryParent= '';
                })
                .catch(console.error);
       },
        deleteCategories(id) {
            return axios.post('/api/categories/' + id, {_method: 'DELETE'})
                .then(this.getCategories)
                .catch(console.error);
        }
       

    }
}
</script>

<style>
.create-categories-form {
    margin-bottom: 10px;
}
</style>