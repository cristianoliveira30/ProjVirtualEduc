<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Início</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/index.css">
	<link rel="stylesheet" href="./css/index.scss">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">VirtualEduc</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse m-3 mr-3" id="navbarSupportedContent">
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
					<ul class="d-flex justify-content-lg-end m-lg-3  navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link text-white" href="cadastro.php">Cadastre-se</a>
						</li>
						<li class="nav-item">
							<a class="nav-link text-white" href="login.php">Entrar</a>
						</li>
					</ul>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<div id="carouselExampleIndicators" class="carousel slide container w-100" data-bs-ride="carousel">
			<div class="carousel-indicators">
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
				<button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
			</div>
			<div class="carousel-inner">
				<div class="carousel-item active">
					<img src="./img/paisagem.jpg" class="imagem-slider img-fluid" alt="...">
				</div>
				<div class="carousel-item">
					<img src="./img/paisagem01.jpg" class="imagem-slider img-fluid" alt="...">
				</div>
				<div class="carousel-item">
					<img src="./img/pexels-luis-gomes-546819.jpg" class="imagem-slider img-fluid" alt="...">
				</div>
			</div>
			<button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
				<span class="carousel-control-prev-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Previous</span>
			</button>
			<button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
				<span class="carousel-control-next-icon" aria-hidden="true"></span>
				<span class="visually-hidden">Next</span>
			</button>
		</div>
		<div class="container p-5">
			<h3>Seja Bem Vindo ao VirtualEduc</h3>
		</div>
		<hr>
		<div class="container" class="container01">
			<div class="row">
				<div class="col-md-6">
					<img src="./img/paisagem01.jpg" alt="" class="img-fluid imagem01">
				</div>
				<div class="col-md-6 p-2" style="text-align: justify;">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, sint eum, nihil voluptatibus voluptates odio sit vero reprehenderit earum, beatae dolor? Illo deleniti maiores ducimus, optio cupiditate consequuntur modi unde!</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, magni adipisci modi ab nemo quibusdam sequi aperiam. Illum, architecto eligendi voluptate repellat, molestiae non ipsam laudantium odio ea aut et.</p>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio cupiditate voluptates voluptas vel? Iusto eos odit ducimus! Provident eaque minus voluptatum, dicta, culpa rem distinctio consectetur, quae unde dolor nemo?</p>
				</div>
			</div>
		</div>
		<hr>
		<div class="container">
			<div class="row">
				<div class="col-md-6 p-2">
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi explicabo corrupti dolores quam et sapiente cumque doloremque sit dignissimos obcaecati consequatur, atque sint. Quibusdam, voluptate tempora assumenda iure distinctio pariatur?</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur culpa quidem laborum reiciendis eum facere nobis dicta, architecto illum. Iusto a obcaecati repellat sequi, quaerat in quas et voluptas ad.</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, consequuntur expedita explicabo provident sunt accusantium. Et quibusdam consequatur ipsam vel doloremque beatae ducimus dolorem aliquid expedita quas, eaque aut impedit!</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, ratione. Magni facilis nobis maxime quidem? Minus, quaerat! Maxime error possimus non. Perferendis perspiciatis, quis ex molestiae cum debitis libero rem.</p>
				</div>
				<div class="col-md-6">
					<img src="./img/paisagem01.jpg" alt="" class="img-fluid imagem01">
				</div>
			</div>
		</div>
		<hr>
		<div class="container p-4" class="container01">
			<div class="row">
				<div class="col-md-6">
					<img src="./img/paisagem01.jpg" alt="" class="img-fluid imagem01">
				</div>
				<div class="col-md-6 p-2" style="text-align: justify;">
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Soluta, sint eum, nihil voluptatibus voluptates odio sit vero reprehenderit earum, beatae dolor? Illo deleniti maiores ducimus, optio cupiditate consequuntur modi unde!</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Magnam, magni adipisci modi ab nemo quibusdam sequi aperiam. Illum, architecto eligendi voluptate repellat, molestiae non ipsam laudantium odio ea aut et.</p>
					<p>Lorem ipsum dolor sit, amet consectetur adipisicing elit. Odio cupiditate voluptates voluptas vel? Iusto eos odit ducimus! Provident eaque minus voluptatum, dicta, culpa rem distinctio consectetur, quae unde dolor nemo?</p>
				</div>
			</div>
		</div>
		<hr>
		<div class="container p-4">
			<div class="row">
				<div class="col-md-6 p-2">
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Excepturi explicabo corrupti dolores quam et sapiente cumque doloremque sit dignissimos obcaecati consequatur, atque sint. Quibusdam, voluptate tempora assumenda iure distinctio pariatur?</p>
					<p>Lorem, ipsum dolor sit amet consectetur adipisicing elit. Aspernatur culpa quidem laborum reiciendis eum facere nobis dicta, architecto illum. Iusto a obcaecati repellat sequi, quaerat in quas et voluptas ad.</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam, consequuntur expedita explicabo provident sunt accusantium. Et quibusdam consequatur ipsam vel doloremque beatae ducimus dolorem aliquid expedita quas, eaque aut impedit!</p>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Unde, ratione. Magni facilis nobis maxime quidem? Minus, quaerat! Maxime error possimus non. Perferendis perspiciatis, quis ex molestiae cum debitis libero rem.</p>
				</div>
				<div class="col-md-6">
					<img src="./img/paisagem01.jpg" alt="" class="img-fluid imagem01">
				</div>
			</div>
		</div>
	</main>
	<footer class="bg-dark text-white pt-5 pb-4">
		<div class="container text-center text-md-left">
			<div class="row text-start text-md-left container">
				<div class="col-md-3 col-lg-3 col-xl-3 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Company Name</h5>
					<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Quae neque repellendus consequatur illo, id numquam facilis a quia officia</p>
				</div>
				<div class="col-md-2 col-lg-2 col-xl-2 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Products</h5>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> TheProvders</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Creativity</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> SourcesFiles</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> bootstrap 5 alpha</a>
					</p>
				</div>
				<div class="col-md-3 col-lg-2 col-xl-2 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Useful links</h5>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Ypur Account</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Become an Affliates</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Shipping Rates</a>
					</p>
					<p>
						<a href="#" class="text-white" style="text-decoration: none;"> Help</a>
					</p>
				</div>
				<div class="col-mb-4 col-lg-3 col-xl-3 mx-auto mt-3">
					<h5 class="text-uppercase mb-4 font-weight-bold text-warning">Contact </h5>
					<p>
						<i class="fas fa-home mr-3"></i> New York, NY, 2333, US
					</p>
					<p>
						<i class="fas fa-envelope mr-3 "></i> theproviders98@gmail.com
					</p>
					<p>
						<i class="fas fa-phone mr-3 "></i> (99)99999-9999
					<p>
						<i class="fas fa-print mr-3 "></i> +01 335 633 77
					</p>
				</div>
			</div>
			<hr class="mb-4">
			<div class="row align-items-center">
				<div class="col-md-7 col-lg-8">
					<p> Copyright 2023 All rights reserved by: <a href="#" style="text-decoration: none;">
							<strong class="text-warning">The Providers</strong>
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