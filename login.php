<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/login.css">
	<link rel="stylesheet" href="./css/login.scss">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
	<!-- Início do Cabeçalho-->
	<header>
		<!--barra de navegação-->
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
		<div class="login-card mt-5 mb-5 p-5">
			<div class="card-header">
				<div class="log">Login</div>
			</div>
			<form class="login">
				<div class="form-group">
					<label for="username">Nome:</label>
					<input required="" name="username" id="username" type="text" maxlength="50">
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input required="" name="password" id="password" type="password" maxlength="8">
				</div>
				<div class="form-group">
					<input value="Login" type="submit">
				</div>
			</form>
		</div>
		<!-- <div class="boxad" id="boxad">
			<div class="content">
				<svg id="loader" xmlns="http://www.w3.org/2000/svg" width="150" height="150" viewBox="0 -10 261 355">
					<g>
						<path d="M230.023 80.02l-.023.03v15.044l-11.96.006v20.75l-19.354 9.142V95.107l-9.93-.04v34.6l-19.417 9.254-.003-43.777-14.146-.016v50.414l-19.354 9.146.002-59.55-9.93.027v59.434l-19.508-9.212V95.15l-13.774-.13-.002 43.766-19.332-9.053V95.12l-9.97.045v29.893l-19.398-9.187V95.177l-11.983.006v15.03l-17.122-8.09 17.078-6.983V80.22L.286 95.257 0 95.12v188.953l123.418 58.308 7.543 3.56 7.542-3.56 123.42-58.306V95.12l-.233.11-31.667-15.06zm-.002 15.076l17.126 7.002-17.125 8.09zM15.083 118.93l108.336 51.177v155.59L15.082 274.52zm231.756 0v155.59l-108.336 51.177v-155.59z">
						</path>
						<path id="pen1" d="M68.26.058L31.934 51.22l.002 58.06H43.9V59.536h19.423v49.742h9.97V59.536H92.62v49.742h11.967V51.22l-1.105-1.554L68.262.058zm6.43 29.72l14.047 19.788H47.784L61.67 30.01l13.02-.23z">
						</path>
						<path id="pen2" d="M130.808 13.936L94.48 65.098l.002 58.058h11.964V73.414h19.424v49.742h9.97V73.414h19.327v49.742h11.967V65.098l-1.105-1.555-35.222-49.607zm6.427 29.72l14.05 19.787H110.33l13.886-19.556 13.02-.23z">
						</path>
						<path id="pen3" d="M193.684.083l-36.328 51.162.002 58.058h11.965V59.56h19.424v49.743h9.97V59.56h19.326v49.743h11.967V51.245l-1.105-1.555L193.685.083zm6.428 29.72l14.05 19.787h-40.955l13.885-19.556 13.02-.23z">
						</path>
					</g>
				</svg>
			</div>
		</div> -->
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

	<script>

		// // Event listener para detectar quando o conteúdo da página foi carregado

		// window.addEventListener("load", function() {
		// 	var boxad = document.getElementById("boxad");
		// 	boxad.style.display = "none"; // Oculta o spinner
		// });

		// // Simula atraso para interromper o carregamento após um tempo

		// setTimeout(function() {
		// 	var boxad = document.getElementById("boxad");
		// 	boxad.style.display = "none"; // Oculta o spinner
		// }, 5000); // Interrompe o carregamento após 5 segundos (ajuste conforme necessário)

	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>

	<script src="./js/script.js"></script>

</body>
</html>