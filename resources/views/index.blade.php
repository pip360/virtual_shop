<x-app tittle="Technologies Shop">

{{-- cart --}}
@if (count(Cart::content()))
	<div class="col-sm-3">
		<p class="text-center">Cart</p>
		<thead>
			<td>Producto</td>
		</thead>
		<table class="table table-striped">
			@foreach (Cart::content() as $item)
				<tr>
					<td>{{$item->name}}</td>
					<td>{{$item->qty}} x {{$item->price}}</td>
					<td>{{number_format($item->qty * $item->price,2)}}</td>
					<td><a href="/eliminaritem/{{$item->rowId}}" class="text-danger">
						<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-lg" viewBox="0 0 16 16">
						<path d="M2.146 2.854a.5.5 0 1 1 .708-.708L8 7.293l5.146-5.147a.5.5 0 0 1 .708.708L8.707 8l5.147 5.146a.5.5 0 0 1-.708.708L8 8.707l-5.146 5.147a.5.5 0 0 1-.708-.708L7.293 8 2.146 2.854Z"/>
						</svg>
					</a></td>
				</tr>
			@endforeach
			<tr><td colspan="4"><p class="text-end m-0 p-0">Subtotal COP ${{Cart::subtotal()}}</p></td></tr>
			<tr><td colspan="4"><p class="text-end m-0 p-0">IVA 19% {{Cart::tax()}}</p></td></tr>
			<tr><td colspan="4"><p class="text-end m-0 p-0">Total COP ${{Cart::total()}}</p></td></tr>
		</table>
		<p class="text-center"><a href="/showcart" class="btn btn-outline-success btn-sm">Show Cart</a></p>
	</div>
@endif

{{-- Carousel --}}
<div id="carouselExampleRide" class="carousel slide" data-bs-ride="true">
	<div class="carousel-inner">
	  <div class="carousel-item active">
		<img src="https://teknopolis.vtexassets.com/assets/vtex.file-manager-graphql/images/6b94c7eb-5c35-4774-b69f-15bfd8191010___b75d5ed9cd6558d8a18062a77f775558.png" class="d-block w-100" alt="...">
	  </div>
	  <div class="carousel-item">
		<img src="https://teknopolis.vtexassets.com/assets/vtex.file-manager-graphql/images/95b2fe4d-1e05-4adf-94ef-a82b7458f5e1___86f5635e2918503375b5b01d8cb4a0bb.jpg" class="d-block w-100" alt="...">
	  </div>
	  <div class="carousel-item">
		<img src="https://teknopolis.vtexassets.com/assets/vtex.file-manager-graphql/images/97f4136a-6c71-45b2-9bdb-ac00574f8afc___317a71b47ae38eb2c4e4c2c856a65acc.jpg" class="d-block w-100" alt="...">
	  </div>
	  <div class="carousel-item">
		<img src="https://teknopolis.vtexassets.com/assets/vtex.file-manager-graphql/images/4e33b21b-3109-447d-9530-ec37532e7de0___a648ba6f2740a0d66d4cddb0d73850c2.png" class="d-block w-100" alt="...">
	  </div>
	</div>
	<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="prev">
	  <span class="carousel-control-prev-icon" aria-hidden="true"></span>
	  <span class="visually-hidden">Previous</span>
	</button>
	<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleRide" data-bs-slide="next">
	  <span class="carousel-control-next-icon" aria-hidden="true"></span>
	  <span class="visually-hidden">Next</span>
	</button>
  </div>
<!-- A Product -->
<section class="d-flex justify-content-center flex-wrap">

@foreach ($products as $product)

<div class="card mx-3 my-3" style="width: 18rem;">
	<div>
		<div class="card-img-top">

		@if ($product->image)
		<img src="/storage/images/{{$product->image}}" class="card-img-top" alt="Product" width="100">
		@else
		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDsRxTnsSBMmVvRxdygcb9ue6xfUYL58YX27JLNLohHQ&s" class="card-img-top" alt="Product">
		@endif
		</div>

		<div class="card-body">
			<h5 class="card-title">{{$product->name}}</h5>
			{{-- <p class="card-text">{{$product->description}}</p> --}}
			<p class="card-text">{{$product->category->name}}</p>
			{{-- <h6 class="card-title">Stock (disponibles): {{$product->stock}}</h6> --}}
			<h6 class="card-text">$ {{$product->price}}</h6>
			<a href="{{route('getproductdetail',['product' => $product->id ])}}" type="submit" class="btn btn-primary d-flex justify-content-between">Ver</a>
			@auth
			<div class="mt-2 d-flex justify-content-between">
				<form action="{{route('additem')}}" method="post">
					@csrf
					{{-- @if ($product->price->count())
						<input type="hidden" name="precio_id" id="precio_{{$product->id}}" value="{{$product->price[0]->id}}">
					@endif --}}
					<input type="hidden" name="precio_id" value="{{$product->price}}">
					<input type="hidden" name="producto_id" value="{{$product->id}}">
					<input type="submit" value="Agregar" class="btn btn-success w-100">
				</form>
			</div>
			@endauth
		</div>
  	</div>
</div>
@endforeach

</section>

</x-app>
