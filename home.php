<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Home</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="./css/home.css">
	<link rel="stylesheet" href="./css/home.scss">
</head>

<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
			<div class="container-fluid">
				<a class="navbar-brand" href="#">VirtualEduc</a>
				<div class="collapse navbar-collapse " id="navbarSupportedContent">
					<ul class="navbar-nav me-auto mb-2 mb-lg-0">
						<li class="nav-item">
							<a class="nav-link active" aria-current="page" href="#">Home</a>
						</li>
						<li class="nav-item">
							<a class="nav-link" href="#">Quem somos</a>
						</li>
						<li class="nav-item dropdown">
							<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
								Novidades
							</a>
							<ul class="dropdown-menu" aria-labelledby="navbarDropdown">
								<li><a class="dropdown-item" href="#">Biblioteca</a></li>
								<li><a class="dropdown-item" href="#">Categorias de Lvros</a></li>
								<li><a class="dropdown-item" href="#">Documentos</a></li>
								<li>
									<hr class="dropdown-divider">
								</li>
								<li><a class="dropdown-item" href="#">Something else here</a></li>
							</ul>
						</li>
						<li class="nav-item">
							<a class="nav-link disabled" href="#" tabindex="-1" aria-disabled="true">Projeto</a>
						</li>
					</ul>
					<div>
						<a class="btn btn-primary" href="cadastro.php" role="button">Cadastre-se</a>
						<a class="btn btn-primary" href="login.php" role="button">
							<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-person-circle" viewBox="0 0 16 16">
								<path d="M11 6a3 3 0 1 1-6 0 3 3 0 0 1 6 0z" />
								<path fill-rule="evenodd" d="M0 8a8 8 0 1 1 16 0A8 8 0 0 1 0 8zm8-7a7 7 0 0 0-5.468 11.37C3.242 11.226 4.805 10 8 10s4.757 1.225 5.468 2.37A7 7 0 0 0 8 1z" />
							</svg>
							Login
						</a>
					</div>
				</div>
			</div>
		</nav>
	</header>
	<main>
		<div class="slider">
			<div class="slides">
				<!-- Radio butto -->
				<input type="radio" name="radio-btn" id="radio1">
				<input type="radio" name="radio-btn" id="radio2">
				<input type="radio" name="radio-btn" id="radio3">
				<input type="radio" name="radio-btn" id="radio4">
				<!-- Fim radio button -->
				<!-- Slide images -->
				<div class="slide first">
					<img src="./img/pexels-cytonn-photography-955405.jpg" alt="imagem1">
				</div>
				<div class="slide">
					<img src="./img/pexels-digital-buggu-374559.jpg" alt="imagem2">
				</div>
				<div class="slide">
					<img src="./img/pexels-luis-gomes-546819.jpg" alt="imagem3">
				</div>
				<div class="slide">
					<img src="./img/pexels-digital-buggu-374559.jpg" alt="imagem4">
				</div>
				<!-- Fim Slide images -->
				<!-- Navigation auto -->
				<div class="navigation-auto">
					<div class="auto-btn1"></div>
					<div class="auto-btn2"></div>
					<div class="auto-btn3"></div>
					<div class="auto-btn4"></div>
				</div>
			</div>
			<div class="manual-navigation">
				<label for="radio1" class="manual-btn"></label>
				<label for="radio2" class="manual-btn"></label>
				<label for="radio3" class="manual-btn"></label>
				<label for="radio4" class="manual-btn"></label>
			</div>
		</div>
		<div class="boas-vidas">
			<h2>Olá, Seja Bem Vindo ao</h2>
			<h2>VirtualEduc</h2>
		</div>
		<div class="container-projeto">
			<div class="sobre-o-projeto">
				<h3 id="h3">O que é o Projeto VirtualEduc?</h3>
				<p>É um projeto desenvolvido pelos alunos da escola Eetepa Dr Celso Malcher. A plataforma tem como objetivo o apoio as turmas, onde serão disponibilizados contéudos programaticos, livros, pdfs e eventos que ocorram entre as turmas.</p>
			</div>
		</div>
		<hr>
		<div class="slides1">
			<img src="./img/paisagem01.jpg" alt="" id="img2">
			<div class="texto">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam adipisci modi, facilis aperiam voluptas magni? Laboriosam sunt expedita nulla nesciunt similique veritatis nihil aliquid inventore blanditiis quo! Hic, labore cumque!</p>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid voluptatibus a sint eveniet blanditiis mollitia eligendi amet laborum commodi doloremque? Tempora animi voluptate necessitatibus quia cum magni nobis repellat officia!</p>
			</div>
		</div>
		<hr>
		<div class="slides2">
			<div class="texto2">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam adipisci modi, facilis aperiam voluptas magni? Laboriosam sunt expedita nulla nesciunt similique veritatis nihil aliquid inventore blanditiis quo! Hic, labore cumque!</p>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid voluptatibus a sint eveniet blanditiis mollitia eligendi amet laborum commodi doloremque? Tempora animi voluptate necessitatibus quia cum magni nobis repellat officia!</p>
			</div>
			<img src="./img/paisagem01.jpg" alt="" id="img2">
		</div>
		<hr>
		<div class="slides1">
			<img src="./img/paisagem01.jpg" alt="" id="img2">
			<div class="texto">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam adipisci modi, facilis aperiam voluptas magni? Laboriosam sunt expedita nulla nesciunt similique veritatis nihil aliquid inventore blanditiis quo! Hic, labore cumque!</p>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid voluptatibus a sint eveniet blanditiis mollitia eligendi amet laborum commodi doloremque? Tempora animi voluptate necessitatibus quia cum magni nobis repellat officia!</p>
			</div>
		</div>
		<hr>
		<div class="slides2">
			<div class="texto2">
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam adipisci modi, facilis aperiam voluptas magni? Laboriosam sunt expedita nulla nesciunt similique veritatis nihil aliquid inventore blanditiis quo! Hic, labore cumque!</p>
				<p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Aliquid voluptatibus a sint eveniet blanditiis mollitia eligendi amet laborum commodi doloremque? Tempora animi voluptate necessitatibus quia cum magni nobis repellat officia!</p>
			</div>
			<img src="./img/paisagem01.jpg" alt="" id="img2">
		</div>
	</main>
	<footer class="navbar navbar-dark bg-dark">
		<h2 id="h2">VirtualEduc</h2>
		<div class="menu-rodapé">
			<ul>
				<div class="a"><a href="#"><label for="">Quem somos</label></a></div>
				<a href="#">
					<li>Projeto</li>
				</a>
				<a href="#">
					<li>Membros</li>
				</a>
				<a href="#">
					<li>Novidades</li>
				</a>
				<a href="#">
					<li>Mais</li>
				</a>
			</ul>
			<ul>
				<div class="a"><a href="#"><label for=""><label for="">Contatos</label></a></div>
				<a href="#">
					<li>E-mail</li>
				</a>
				<a href="#">
					<li>Telefone</li>
				</a>
				<a href="#">
					<li>Instagram</li>
				</a>
				<a href="#">
					<li>Facebook</li>
				</a>
			</ul>
			<ul>
				<div class="a"><a href="#"><label for="">Parceiros</label></a></div>
				<a href="#">
					<li>Eetepa Dr Celso Malcher</li>
				</a>
				<a href="#">
					<li>UFPA</li>
				</a>
				<a href="#">
					<li>Parque de Guamã</li>
				</a>
				<a href="#">
					<li>Alunos</li>
				</a>
			</ul>
		</div>
	</footer>

	<script src="./js/home.js"></script>

</body>

</html>