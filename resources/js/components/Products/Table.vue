<template>
	<table class="table">
		<thead>
			<tr>
				<th>Nombre</th>
				<!-- <th>Descripción</th> -->
				<th>Stock</th>
				<th>Price</th>
				<th>Acciones</th>
			</tr>
		</thead>
		<tbody>
			<tr v-for="(product, index) in products" :key="index">
				<td>{{product.name}}</td>
				<!-- <td>{{product.description}}</td> -->
				<td>{{product.stock}}</td>
				<td>{{product.price}}</td>
				<td>
					<button class="btn btn-warning me-2 btn-sm" @click="getProduct(product)">Editar</button>
					<button class="btn btn-danger btn-sm" @click="deleteProduct(product)">Eliminar</button>
				</td>
			</tr>
		</tbody>
	</table>
</template>

<script>
export default {
	props:['products_data'],
	data() {
		return {
			products: [],

		}
	},
	created() {
		this.index()
	},
	methods:{
		index(){
			this.products = [...this.products_data]
		},
		async getProduct(product){
			try {
			// const { data } = await axios.get(`Products/GetAProduct/${product.id}`)
			this.$parent.editProduct(product)
			} catch (error) {
				console.error(error)
			}
		},
		async deleteProduct(product){
			try {
				 const result = await swal.fire({
					icon: 'info',
					title: 'Quiere eliminar el producto?',
					showCancelButton: true,
					confirmButtonText: 'Eliminar',
				})
					if (!result.isConfirmed) return

			await axios.delete(`Products/DeleteAProduct/${product.id}`)
			this.$parent.getProducts()
				swal.fire({
							icon: 'success',
							title: 'Felicidades!',
							text: 'Producto Eliminado!'
						})
			} catch (error) {
				console.error(error)
			}
		}
	}
}
</script>
