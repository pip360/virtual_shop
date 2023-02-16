<template>
<section class="d-flex justify-content-center flex-wrap">

<div class="card mx-3 my-3" style="width: 18rem;">

	
	<div class="card-body">
		
		<img src="/storage/images/product.image" class="card-img-top">
		
	
    <h5 class="card-title">{{product.name}}</h5>
    <p class="card-text">{{product.description}}</p>
	<p class="card-text">{{product.category}}</p>
	<h6 class="card-title">Stock (disponibles): {{product.stock}}</h6>
	<h6 class="card-title">$ {{product.price}}</h6>

	<input type="submit" value="Agregar" @click="addCart(this.product)">
  </div>
</div>
</section>
</template>

<script>
export default{
	props:['product'],
	data(){
		return {
			cart: [],
		}
	},
	created() {
		this.index
		if (localStorage.getItem('cart')) {
			try {
				this.cart = JSON.parse(localStorage.getItem('cart'))
			} catch (error) {
				localStorage.removeItem('cart')
				console.error(error)
			}
		}
	},
	methods:{
		addCart(){
			this.cart.push(this.product)
			this.saveproduct()
			swal.fire({
						icon: 'success',
						title: 'Felicidades!',
						text: 'Producto almacenado!'
					})
		},
		saveproduct(){
			const parsed = JSON.stringify(this.cart);
			localStorage.setItem('cart', parsed);
		}
	}
}
</script>
