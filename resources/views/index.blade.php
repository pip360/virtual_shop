<x-app tittle="Technologies Shop">

<!-- A Product -->
<section class="d-flex justify-content-center flex-wrap">
@foreach ($products as $product)
<div class="card mx-3 my-3" style="width: 18rem;">

	@if ($product->image)
		<img src="/storage/images/{{$product->image}}" class="card-img-top" alt="Product">
	@else
		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDsRxTnsSBMmVvRxdygcb9ue6xfUYL58YX27JLNLohHQ&s" class="card-img-top" alt="Product">
	@endif

  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
	<h6 class="card-title">Stock (disponibles): {{$product->stock}}</h6>
	<h6 class="card-title">$ {{$product->price}}</h6>
    <a href="#" class="btn btn-primary">Añadir al carrito</a>
  </div>
</div>
@endforeach
</section>

</x-app>
