<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
	<link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/home.scss">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark h-75">
			<div class="container-fluid">
				<a class="navbar-brand text-warning" href="#"><b>VirtualEduc</b></a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link" href="index.php">Início</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Categoria
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Livros</a></li>
								<li><a class="dropdown-item" href="#">Documentos</a></li>
								<li><a class="dropdown-item" href="#">Curso</a></li>
								<li><a class="dropdown-item" href="#">Material</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Novidades</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Sobre o Projeto</a>
						</li>
					</ul>
					<div id="links" class="me-2">
						<a class="btn btn-primary" href="./cadastro.php" role="button">Cadastro</a>
						<a class="btn btn-primary" href="./login.php" role="button">Login</a>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<h2 class="text-center p-2 mt-5 ">Perfil</h2>
		<strong>
			<p class="text-center">Foto de Perfil</p>
		</strong>
		<div class="container-fluid d-flex" id="container-perfil">
			<img src="./img/imagem-perfil.jpg" class="mx-auto mb-5" alt="imagem de perfil" title="imagem de perfil">
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
	<footer class="bg-dark text-white pt-5 pb-4">
		<div class="container text-center text-md-left">
			<div class="row text-start text-md-left container p-0">
				<div class="col-md-4 pe-3 me-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">VirtualEduc</h5>
					<p>Ficamos gratos de poder ofertar aos estudantes um ambiente organizado e
						com recursos para o estudo, com acesso a cursos gratuitos e sem restrições.
					</p>
				</div>
				<div class="col-md-2 p-0">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Categorias</h5>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Livros</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Documentos</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Cursos</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Materiais</a>
					</p>
				</div>
				<div class="col-md-2 p-0">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Opções</h5>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;">Meu perfil</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Doações</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Ajuda</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Sair</a>
					</p>
				</div>
				<div class="col-md-3 p-0">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contato </h5>
					<p>
						<i class="fas fa-envelope mr-3 "></i> virtualeducatendimento@gmail.com
					</p>
					<p>
						<i class="fas fa-phone mr-3 "></i> (99)99999-9999
					</p>
				</div>
			</div>
			<hr class="mb-4">
			<div class="row align-items-center">
				<div class="col-md-7 col-lg-8">
					<p> Copyright 2023 All rights reserved by: <a href="#" style="text-decoration: none;">
							<strong class="text-warning">VirtualEduc</strong>
						</a></p>
				</div>
				<div class="col-md-5 col-lg-4">
					<div class="text-center text-md-right">
						<ul class="list-unstyled list-inline">
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-facebook"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-twitter"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-google-plus"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-linkedin-in"></i></a>
							</li>
							<li class="list-inline-item">
								<a href="#" class="btn-floating btn-sm text-white" style="font-size: 23px;"><i class="fab fa-youtube"></i></a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

</body>

</html>