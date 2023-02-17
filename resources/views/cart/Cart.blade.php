<x-app>
<section>
<div class="container">
	<div class="row justify-content-center">
		<div class="col-sm-8 bg-light">
			<p class="text-center fs-4 p-3">Cart</p>
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
									<a href="" class="btn btn-success">-</a>
									<button type="button" class="btn">{{$item->qty}}</button>
									<a href="" class="btn btn-success">+</a>
								</div>
							</td>
							<td>{{number_format($item->qty * $item->price,2)}}</td>
							<td><a href="" class="btn btn-sm text-danger">x</a></td>
						</tr>
					@endforeach
						<tr><td colspan="5"><p class="text-end m-0 p-0">Subtotal COP{{Cart::subtotal()}}</p></td><td></td></tr>
						<tr><td colspan="5"><p class="text-end m-0 p-0">IVA 19%{{Cart::tax()}}</p></td><td></td></tr>
						<tr><td colspan="5"><p class="text-end m-0 p-0">Total COP{{Cart::total()}}</p></td><td></td></tr>
				</tbody>
			</table>
			<div class="row justify-content-center mt-5 mb-5 text-center">
				<div class="col-sm-4">
					<a href="#" class="btn btn-outline-danger">Eliminar Carrito</a>
				</div>
				<div class="col-sm-4">
					@auth
					<a href="" class="btn btn-danger">Ordenar ahora</a>
					@else
					<a href="{{ route('login') }}" class="btn btn-danger">Ingresar para ordenar</a>
					@endauth
				</div>
			</div>
		</div>
	</div>
</div>
</section>
</x-app>
