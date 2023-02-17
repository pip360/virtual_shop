<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$tittle ?? 'TechShop | Tienda Virtual'}}</title>


	<link rel="icon" href="storage/images/hand-index-thumb.svg" type="image/svg">
	
    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
	
	@yield('css')
	@yield('js') 

    <!-- Scripts -->
    @vite(['resources/sass/app.scss', 'resources/js/app.js'])
</head>
<body>
	<!-- menu -->
	<!-- {{-- @include('components.menu') --}} --> <!-- ANTIGUA NOMENCLATURA -->
	<x-menu/>

<!-- content -->
	<main id="app">
		<div class="container mt-4">
			<x-alerts/>
		</div>
		{{$slot}}
	</main>
</body>
</html>
