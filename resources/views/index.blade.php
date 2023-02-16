<x-app tittle="Technologies Shop">
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


	@if ($product->image)
		<img src="/storage/images/{{$product->image}}" class="card-img-top" alt="Product">
	@else
		<img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcRDsRxTnsSBMmVvRxdygcb9ue6xfUYL58YX27JLNLohHQ&s" class="card-img-top" alt="Product">
	@endif

  <div class="card-body">
    <h5 class="card-title">{{$product->name}}</h5>
    <p class="card-text">{{$product->description}}</p>
	<p class="card-text">{{$product->category->name}}</p>
	<h6 class="card-title">Stock (disponibles): {{$product->stock}}</h6>
	<h6 class="card-title">$ {{$product->price}}</h6>
    <a href="{{route('getproductdetail',['product' => $product->id ])}}" type="submit" class="btn btn-primary d-flex justify-content-between">Ver</a>
  </div>
</div>
@endforeach
</section>

</x-app>
