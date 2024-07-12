<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
	<link rel="stylesheet" href="/assets/css/home.css">
	<link rel="stylesheet" href="/assets/css/home.scss">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	@component('components.head')
	@endcomponent
	<script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
	<header id="header"></header>

	<main>
		<h2 class="text-center p-2 mt-5 ">Bem-vindo {{ $authUser->nomecomp }}</h2>
		<strong>
			<p class="text-center">Foto de Perfil</p>
		</strong>
		<div class="container-fluid d-flex" id="container-perfil">
			<img src="/assets/img/imagem-perfil.jpg" class="mx-auto mb-5" alt="imagem de perfil" title="imagem de perfil">
		</div>

		<h4 class="p-2 text-center mb-3">Selecione uma opção</h4>

		<!-- <span class="material-symbols-outlined">
			person
		</span> -->

		<!-- <span class="material-symbols-outlined">
			lists
		</span>

		<span class="material-symbols-outlined">
			menu_book
		</span>

		<span class="material-symbols-outlined">
			description
		</span> -->

		<div class="container p-5 w-75 mb-5 bg-primary mx-auto d-flex justify-content-center nav-container">

			<button type="button row btn-primary">
				<span class="material-symbols-outlined">
					person
				</span>
				<label for="">Meus dados</label>
			</button>

			<button type="button row btn-primary">
				<span class="material-symbols-outlined">
					lists
				</span>
				<label for="">Cursos</label>
			</button>

			<button type="button row btn-primary">
				<span class="material-symbols-outlined">
					menu_book
				</span>
				<label for="">Livros</label>
			</button>

			<button type="button row btn-primary">
				<span class="material-symbols-outlined">
					description
				</span>
				<label for="">Temas</label>
			</button>

		</div>
		<div class="container-fluid mx-auto d-flex ">
			<a class="nav-btn-sair mx-auto text-white" id="btnsair" href="./index.php">
				Sair
			</a>
		</div>
	</main>

	<footer id="footer" class="bg-dark text-white pt-5 pb-4"></footer>
</body>
</html>