<!DOCTYPE html>
<html lang="pt-br">
<head>
	<title>Home</title>
	@component('components.head')
		@slot('defer')
			defer
		@endslot
	@endcomponent
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link rel="stylesheet" href="/assets/css/testegeral.css">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
</head>
<body>
	@routes
	<header id="">
		@component('components.header')
		@endcomponent
	</header>

	<main>
		@component('components.sidebar')
		@endcomponent
	</main>
</body>
</html>