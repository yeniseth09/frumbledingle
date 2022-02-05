import { createApp
} from 'vue';
import CategoriesTable from './components/CategoriesTable.vue';
import ItemsTable from './components/ItemsTable.vue';
import LocationsTable from './components/LocationsTable.vue';
import ReportsTable from './components/ReportsTable.vue';

const app = createApp({});
app.component('locations-table', LocationsTable)
.component('items-table', ItemsTable)
.component('categories-table', CategoriesTable)
.component('reports-table', ReportsTable)
.mount('#app-container');
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

/*require('./bootstrap');

window.Vue = require('vue');

Vue.component('locations-table', require('./components/LocationsTable.vue'));
Vue.component('items-table', require('./components/ItemsTable.vue'));
Vue.component('categories-table', require('./components/CategoriesTable.vue'));
Vue.component('reports-table', require('./components/ReportsTable.vue'))


new Vue({el: '#app-container'});*/
