<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Login</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/login.css">
</head>

<body class="bg-dark">

	<!-- Início do Cabeçalho-->
	<header class="">
		<!--barra de navegação-->
		<nav class="navbar navbar-expand-lg bg-dark">
			<div class="container-fluid">
				<a class=" link-light navbar-brand" href="#">VirtualEduc</a>
				<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon"></span>
				</button>
				<div class="collapse navbar-collapse" id="navbarNav">
					<ul class="navbar-nav">
						<li class="nav-item">
							<a class=" link-light nav-link active" aria-current="page" href="#">Como Usar</a>
						</li>
						<li class="nav-item">
							<a class=" link-light nav-link" href="#">Quem somos</a>
						</li>
						<li class="nav-item dropdown">
							<a class=" link-light nav-link dropdown-toggle" href="#" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Dropdown
							</a>
							<ul class="dropdown-menu">
								<li><a class=" link-light dropdown-item" href="#">Action</a></li>
								<li><a class=" link-light dropdown-item" href="#">Another action</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class=" link-light dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class=" link-light nav-link disabled" aria-disabled="true">Acessar Conteúdo</a>
						</li>
					</ul>
					<div name="buttons" class="position-absolute end-0 me-4">
						<a class=" link-light btn btn-primary" href="./cadastro.php" role="button">Cadastre-se</a>
						<a class=" link-light btn btn-info" href="./index.php" role="button">Início</a>
					</div>
				</div>
			</div>
		</nav>
	</header>

	<main class="rounded-pill">
		<!--formulário do login-->
		<div class="w-28 position-absolute top-50 start-50 translate-middle bg-dark-subtle border border-primary" id="caixa">
			<form class=" align-items-center">
				<div class="mb-3">
					<label for="exampleInputEmail1" class="form-label">Email</label>
					<input type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
					<div id="emailHelp" class="form-text">Nunca compartilharemos seu e-mail com mais ninguém.</div>
				</div>
				<div class="mb-3">
					<label for="exampleInputPassword1" class="form-label">Senha</label>
					<input type="password" class="form-control" id="exampleInputPassword1">
				</div>
				<div class="mb-3 form-check">
					<input type="checkbox" class="form-check-input" id="exampleCheck1">
					<label class="form-check-label" for="exampleCheck1"><a href="">Li e concordo com os termos</a></label>
				</div>
				<button type="submit" class="btn btn-primary">Enviar</button>
			</form>
		</div>
	</main class="">

	<footer class="">
	</footer>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script>
		// Event listener para detectar quando o conteúdo da página foi carregado
		window.addEventListener("load", function() {
			var boxad = document.getElementById("boxad");
			boxad.style.display = "none"; // Oculta o spinner
		});

		// Simula atraso para interromper o carregamento após um tempo
		setTimeout(function() {
			var boxad = document.getElementById("boxad");
			boxad.style.display = "none"; // Oculta o spinner
		}, 5000); // Interrompe o carregamento após 5 segundos (ajuste conforme necessário)
	</script>

	<div class="boxad" id="boxad">
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
	</div>

</body>

</html>