import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select';


//components
import ProductsList from './components/Products/Index.vue';
/* import ProductDetail from './components/productdetail/ProductDetail.vue'; */
import CategoriesTable from './components/categories/Index.vue';
import CategoriesView from './components/categoriesview/Index.vue';

const app = createApp({
	components: {
		ProductsList,
		CategoriesTable,
		CategoriesView
		/* ProductDetail */
	}
})

app.component("v-select", vSelect)
app.mount('#app')
