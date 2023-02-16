<template>
	<div class="text-center d-flex justify-content-between m-4">
		<div>
			<a href="/" class="btn btn-primary ">Regresar</a>
		</div>
	</div>

	<section class="container m-lg-auto text-center m-2">
		<table class="table table-bordered">
			<thead>
				<tr>
					<th>Image</th>
					<th>Nombre</th>
					<th>Stock</th>
					<th>Precio</th>
					<th>Action</th>
				</tr>
			</thead>
			<tbody>
				<tr v-for="(item, index) in this.cart" :key="index">
					<td>
						<img :src="url" alt="product-image" width="50" height="50">
					</td>
					<td>{{ item.name }}</td>
					<td>{{ item.stock }}</td>
					<td>${{ item.price }}</td>
					<td>
						<button class="btn btn-danger btn-sm" @click="deleteItem(item)">Delete</button>
					</td>
				</tr>
			</tbody>
		</table>
	</section>
	</template>

<script>
export default {
 props: [],

    data() {
        return {
            cart: [],
            url: 'https://http2.mlstatic.com/D_NQ_NP_941284-MCO53763270024_022023-O.webp',
        }
    },

    created() {
        this.index()
        this.cart = JSON.parse(localStorage.getItem('cart'))
        console.log(this.cart)
        if (this.cart == null) {
            return swal.fire({
                icon: 'warning',
                title: 'Your cart is empty!',
                text: 'Please add products to your cart!'
            })
        }
    },

    methods: {

        async index() {},

        async deleteItem(item) {
            try {
                const result = await swal.fire({
                    title: 'Do you want delete the item?',
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    confirmButtonText: 'Delete'
                })

                if (!result.isConfirmed) return

                localStorage.removeItem('cart')
                this.cart = []
                // this.cart = JSON.parse(localStorage.getItem('cart'))

                swal.fire({
                    icon: 'success',
                    title: 'Congrats!',
                    text: 'Item Deleted!'
                })
            } catch (error) {
                console.error(error);
            }
        },
    },
}

</script>

