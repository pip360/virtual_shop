<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{$tittle ?? 'Technologies Shop'}}</title>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.bunny.net/css?family=Nunito" rel="stylesheet">
	{{-- <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.2.0/css/bootstrap.min.css">
	@yield('css')
	@yield('js') --}}

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
	<main/>
</body>
</html>
