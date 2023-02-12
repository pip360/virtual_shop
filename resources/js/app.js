import './bootstrap'
import { createApp } from 'vue'
import vSelect from 'vue-select';


//components
import ExampleComponent from './components/ExampleComponent.vue'
import ProductsList from './components/Products/Index.vue';

const app = createApp({
	components: {
		ejemplo:ExampleComponent,
		ProductsList
	}
})

app.component("v-select", vSelect)
app.mount('#app')
