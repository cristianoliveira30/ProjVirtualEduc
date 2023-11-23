<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Início</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/style.css">
	<link rel="stylesheet" href="./css/style.scss">
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
						<li class="nav-item dropdown disabled">
							<a class="nav-link dropdown-toggle disabled" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Categoria
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item disabled" href="#">Livros</a></li>
								<li><a class="dropdown-item disabled" href="#">Documentos</a></li>
								<li><a class="dropdown-item disabled" href="#">Curso</a></li>
								<li><a class="dropdown-item disabled" href="#">Material</a></li>
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
		<div id="carouselExampleAutoplaying" class="carousel slide" data-bs-ride="carousel">
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="./img/slider01.jpg" class="d-block w-100 h-50" alt="...">
				</div>
				<div class="carousel-item">
					<img src="./img/paisagem01.jpg" class="d-block w-100 h-50" alt="...">
				</div>
				<div class="carousel-item">
					<img src="./img/imagem02.jpeg" class="d-block w-100 h-50" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next btn-icon" type="button" data-bs-target="#carouselExampleAutoplaying" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<section class="sobre-projeto container-fluid">
			<h2 class="text-center">Seja Bem Vindo ao VirtualEduc</h2>
			<div class="container-projeto">
				<div class="container-imagens">
					<img src="./img/paisagem01.jpg" alt="imagem de paisagem" class="img-fluid ">
				</div>
				<div class="texto-projeto">
					<h2>Sobre o Projeto</h2>
					<p>O VirtualEduc é um projeto desenvolvido <br> pelos alunos da escola da capacitação <br> técnica Eetepa Dr. Celso Malcher. <br> Cujo objetivo era organizar os <br> conteúdo disciplinares e acesso remoto <br> ao acervo do livros da biblioteca escolar.</p>
				</div>
			</div>
		</section>
		<hr>
		<section class="funcionalidades">
			<div class="container-funcionalidades">
				<div class="texto-funcionalidades">
					<h2>Funcionalidades</h2>
					<p>A plataforma oferece acessibilidade para organizar, <br> matérias disciplinares, com base nas informações <br> obtidas no cadastro; exemplo: nome, idade, <br> escolaridade e etc. Possibilita e locação de livros, <br> e define o prazo de entregar e as categorias disponíveis.</p>
				</div>
				<div class="container-img-funcionalidades">
					<img src="img/paisagem01.jpg" alt="" class="img-fluid img02">
				</div>
			</div>
		</section>
	</main>
	<br>
	<hr>
	<br>
	<footer class="bg-dark text-white pt-5 pb-4">
		<div class="container text-center text-md-left">
			<div class="row text-start text-md-left container">
				<div class="col-md-6 mx-0">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">VirtualEduc</h5>
					<p>Ficamos gratos de poder ofertar aos estudantes um ambiente organizado e
						com recursos para o estudo, com acesso a cursos gratuitos e sem restrições.
					</p>
				</div>
				<div class="col-md-2 mx-0 ps-0">
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
				<div class="col-md-4 mx-0">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contato </h5>
					<p>
						<i class="fas fa-envelope mr-3 "></i> VEducatendimento@gmail.com
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

	<script src="/js/script.js"></script>

</body>
</html>