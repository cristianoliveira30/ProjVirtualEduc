<?php

?>
<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Home</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
  <link rel="stylesheet" href="css/home.css">
  <link rel="stylesheet" href="./css/home.scss">
</head>

<body>
  <header class="">
    <nav class="container01 navbar navbar-expand-lg navbar-light bg-light navbar navbar-dark bg-dark">
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
    <div id="carouselExampleIndicators" class="carousel slide">
      <div class="carousel-indicators">
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
        <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
      </div>
      <div class="carousel-inner">
        <div class="carousel-item active">
          <img src="./img/pexels-cytonn-photography-955405.jpg" class="img" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./img/pexels-digital-buggu-374559.jpg" class="img" alt="...">
        </div>
        <div class="carousel-item">
          <img src="./img/pexels-luis-gomes-546819.jpg" class="img" alt="...">
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
    <div class="boas-vidas">
      <h2>Olá, Seja Bem Vindo ao</h2>
      <h2>VirtualEduc</h2>
    </div>
    <div class="container-projeto">
      <div class="sobre-o-projeto">
        <h3>O que é o Projeto VirtualEduc?</h3>
        <p>É um projeto desenvolvido pelos alunos da escola Eetepa Dr Celso Malcher. A plataforma tem como objetivo o apoio as turmas, onde serão disponibilizados contéudos programaticos, livros, pdfs e eventos que ocorram entre as turmas.</p>
        <p id="paragro2"></p>
      </div>
    </div>
    <hr>
    <div class="slides">
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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>

</html>