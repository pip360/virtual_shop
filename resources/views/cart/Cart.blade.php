<x-app>

<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8 bg-light">
			@include('Cart.partials.mensaje')
			<p class="text-center fs-4 p-3">Carrito de Compras</p>
			@if (Cart::content()->count())
				<table class="table table-striped">
					<thead>
						<th>Imagen</th>
						<th>Producto</th>
						<th>Precio</th>
						<th>Cantidad</th>
						<th>TOTAL</th>
						<th></th>
					</thead>
					<tbody>

						@foreach (Cart::content() as $item)
							<tr>
								<td><img src="/storage/images/{{$item->options->image}}" width="100"></td>
								<td>{{$item->name}}</td>
								<td>{{$item->price}}</td>
								<td>
									<div class="btn-group btn-group-sm" role="group" aria-label="Small button group">
										<a href="/decrementar/{{$item->rowId}}" class="btn btn-success">-</a>
										<button type="button" class="btn">{{$item->qty}}</button>
										<a href="/incrementar/{{$item->rowId}}" class="btn btn-success">+</a>
									</div>
								</td>
								<td>{{number_format($item->qty * $item->price,2)}}</td>
								<td><a href="/eliminaritem/{{$item->rowId}}" class="btn btn-sm text-danger">
									<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
									<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
									</svg>
								</a></td>
							</tr>
						@endforeach
							<tr><td colspan="5"><p class="text-end m-0 p-0">Subtotal COP{{Cart::subtotal()}}</p></td><td></td></tr>
							<tr><td colspan="5"><p class="text-end m-0 p-0">IVA 19%{{Cart::tax()}}</p></td><td></td></tr>
							<tr><td colspan="5"><p class="text-end m-0 p-0">Total COP{{Cart::total()}}</p></td><td></td></tr>
					</tbody>
				</table>
				<div class="row justify-content-center mt-5 mb-5 text-center">
					<div class="col-sm-4">
						<a href="/eliminarcarrito" class="btn btn-outline-danger">Eliminar Carrito</a>
					</div>
					<div class="col-sm-4">
						@auth
						<a href="" class="btn btn-danger">Ordenar ahora</a>
						@else
						<a href="{{ route('login') }}" class="btn btn-danger">Ingresar para ordenar</a>
						@endauth
					</div>
				</div>
			@else
			<p class="text-center">Carrito Vacio</p>
			<p class="text-center"> <a href="/" class="text-decoration-none"> Agrega productos ahora <svg xmlns="http://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-cart-plus-fill" viewBox="0 0 16 16">
				<path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0zM9 5.5V7h1.5a.5.5 0 0 1 0 1H9v1.5a.5.5 0 0 1-1 0V8H6.5a.5.5 0 0 1 0-1H8V5.5a.5.5 0 0 1 1 0z"/>
			  </svg></a></p>
			@endif
		</div>
	</div>
</div>

</x-app>
