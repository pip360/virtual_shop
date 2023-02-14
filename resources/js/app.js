import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select';


//components
import ExampleComponent from './components/ExampleComponent.vue'
import ProductsList from './components/Products/Index.vue';
import ProductDetail from './components/productdetail/ProductDetail.vue';
import Cart from './components/cart/Cart.vue';

const app = createApp({
	components: {
		ejemplo:ExampleComponent,
		ProductsList,
		ProductDetail,
		Cart
	}
})

app.component("v-select", vSelect)
app.mount('#app')
