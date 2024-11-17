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
	<link rel="stylesheet" href="/assets/css/home.css">
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

		{{-- tenho que criar uma div com seguidos e seguidores --}}
		
		{{-- <div id="divheader">
			<div id="addcard" class="col-md-6 rounded-4 d-flex align-items-center justify-content-center flex-column">
				<img class="m-2" src="/assets/img/svgs/plus-square.svg" style="width: 4vh">
				<h6 style="font-size: 0.9em; text-align:center;">Adicionar Conteúdo</h6>
			</div>
		</div> --}}


	</main>
</body>
</html>