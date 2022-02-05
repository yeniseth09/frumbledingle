
  
<template>
    <div>
        <form @submit.prevent="createItem">
            <div class="create-items-form input-group">
                <div class="input-group-prepend">
                    <span class="input-group-text">Name</span>
                </div>
                <input v-model="newItemName" type="text" class="form-control" placeholder="Item Name" />
                <div class="input-group-prepend">
                   <span class="input-group-text">Location</span>
                </div>
                <div class="input-group-prepend">
                   <select v-model="NewItemLocation"  class="form-control">
                    <option disabled value="">Please select one</option>
                    <option v-for="ubi in locations" :key="ubi.id" v-bind:value="ubi.id">{{ubi.name}}</option>                            
                 </select>
                </div>
                <div class="input-group-prepend">
                   <span class="input-group-text">Category</span>
                </div>
                 <div class="input-group-prepend">
                   <select v-model="NewItemCategory"  class="form-control">
                    <option disabled value="">Please select one</option>
                    <option v-for="categ in categories" :key="categ.id" v-bind:value="categ.id">{{categ.name}}</option>                            
                 </select>
                </div>

                
                <div class="input-group-prepend">
                    <span class="input-group-text">Price</span>
                </div>
                <input v-model="newItemPrice" type="text" class="form-control" placeholder="Price" />
                <div class="input-group-append">
                    <button class="btn btn-primary">Create</button>
                </div>
            </div>
        </form>
         <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <th>ID</th>
                <th>Name</th>
                <th>Location</th>
                <th>Category</th>
                <th>Price</th>
                 <th> Option </th>
            </thead>
            <tbody>
                <tr v-for="row in items" :key="row.id">
                    <td>{{ row.id }}</td>
                    <td>{{ row.name }}</td>
                    <td> {{  row.location.name }} </td>
                    <td> {{  row.category.name }} </td>
                    <td> {{ row.price }} </td>

                    <td align="center"><button class="btn btn-danger btn-sm" @click.prevent="deleteItem(row.id)"><i class="fa fa-times" /> Delete</button></td>
                </tr>
            </tbody>
        </table>
    </div>
</template>


<script>
import axios from 'axios';

export default {
    data() {
        return {
           items: [],
           locations: [],
           categories: [],
           newItemName: '',
           NewItemLocation: '', 
           NewItemCategory:'',
           newItemPrice: '',
        };
    },
    mounted() {
       this.getItems();
       this.getLocations();
       this.getCategories();
    },
    methods: {

     getItems(){
           return axios.get('/api/items')
            .then(response => {
                this.items = response.data;
            }).catch(console.error);
       },
       getLocations(){
           return axios.get('/api/locations')
            .then(response => {
                this.locations =response.data;
            }).catch(console.error);
       },
        getCategories(){
           return axios.get('/api/categories')
            .then(response => {
                this.categories =response.data;
            }).catch(console.error);
       },
      
       createItem() {
         return axios.post('/api/items', {
                      name: this.newItemName,
                      location: this.NewItemLocation,
                      category: this.NewItemCategory,
                      price: this.newItemPrice })
                .then(this.getItems)
                .then(() =>{
                    this.newItemName= '';
                    this.NewItemLocation= '';
                    this.NewItemCategory= '';
                    this.newItemPrice= '';
                })
                .catch(console.error);
              
       },
        deleteItem(id) {
            return axios.post('/api/items/' + id, {_method: 'DELETE'})
                .then(this.getItems)
                .catch(console.error);
        }
      

    }
}
</script>



<style>
.create-items-form {
    margin-bottom: 10px;
}
</style>