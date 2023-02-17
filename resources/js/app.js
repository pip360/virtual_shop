import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select';


//components
import ProductsList from './components/Products/Index.vue';
/* import ProductDetail from './components/productdetail/ProductDetail.vue'; */


const app = createApp({
	components: {
		ProductsList,
		/* ProductDetail */
	}
})

app.component("v-select", vSelect)
app.mount('#app')
