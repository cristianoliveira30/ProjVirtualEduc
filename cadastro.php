<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/cadastro.css">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
</head>
<body class="bg-dark">
  <header>
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
            <a class=" link-light btn btn-primary" href="./index.php" role="button">Início</a>
            <a class=" link-light btn btn-info" href="./login.php" role="button">Login</a>
          </div>
        </div>
      </div>
    </nav>
  </header>
  <main class="position-fixed top-50 start-50 translate-middle">
    <div class="FromCadastro bg-dark-subtle rounded-4 top-50 start-50 border border-primary p-3 text-bg-dark-subtle d-inline-block">
      <form class="FormCadastro row g-3" action="./BEnd/configBD.php" method="post" enctype="multipart/form">
        <div class="col-md-6">
          <label for="inputEmail4" class="form-label">Email</label>
          <input type="email" class="form-control" id="inputEmail4" name="email" placeholder="Seu E-mail">
        </div>
        <div class="col-md-6">
          <label for="inputPassword4" class="form-label">Senha</label>
          <input type="password" class="form-control" id="inputPassword4" name="senha" placeholder="Sua Senha">
        </div>
        <div class="col-12">
          <label for="inputAddress" class="form-label">Nome de Usuário</label>
          <input type="text" class="form-control" id="inputAddress" name="nomeusu" placeholder="Nome de Usuário">
        </div>
        <div class="col-12">
          <label for="inputAddress2" class="form-label">Nome Completo</label>
          <input type="text" class="form-control" id="inputAddress2" name="nomecomp" placeholder="Nome Completo">
        </div>
        <div class="col-md-6">
          <label for="inputCity" class="form-label">Telefone</label>
          <input type="text" class="form-control" id="inputCity" name="tel" placeholder="+55 (99) 99999-9999">
        </div>
        <div class="col-md-4">
          <label for="inputState" class="form-label">Escolaridade</label>
          <select id="inputState" class="form-select" name="escolaridade">
            <option selected>Não informado</option>
            <option>Ensino fundamental incompleto </option>
            <option>Ensino fundamental completo </option>
            <option>Ensino médio incompleto </option>
            <option>Ensino médio completo </option>
            <option>Ensino superior incompleto </option>
            <option>Ensino superior completo </option>
            <option>Pós-Graduação incompleta </option>
            <option>Pós-Graduação completa </option>
            <option>Mestrado incompleto </option>
            <option>Mestrado completo </option>
            <option>Doutorado incompleto </option>
            <option>Doutorado Completo </option>
          </select>
        </div>
        <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" id="gridCheck">
            <label class="form-check-label" for="gridCheck">
              Check me out
            </label>
          </div>
        </div>
        <div class="col-12">
          <button type="submit" id="btn-submit" class="btn btn-primary">Sign in</button>
        </div>
      </form>
    </div>
    <div id="janela-modal" class="janela-modal p-3 mb-2 bg-white text-dark rounded d-none">
      <div class="" id="abrir">
        <form class="row g-3">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input type="email" class="form-control" id="inputEmail4">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Password</label>
            <input type="password" class="form-control" id="inputPassword4">
          </div>
          <div class="col-12">
            <label for="inputAddress" class="form-label">Address</label>
            <input type="text" class="form-control" id="inputAddress" placeholder="1234 Main St">
          </div>
          <div class="col-12">
            <label for="inputAddress2" class="form-label">Address 2</label>
            <input type="text" class="form-control" id="inputAddress2" placeholder="Apartment, studio, or floor">
          </div>
          <div class="col-md-6">
            <label for="inputCity" class="form-label">City</label>
            <input type="text" class="form-control" id="inputCity">
          </div>
          <div class="col-md-4">
            <label for="inputState" class="form-label">State</label>
            <select id="inputState" class="form-select">
              <option selected>Choose...</option>
              <option>...</option>
            </select>
          </div>
          <div class="col-md-2">
            <label for="inputZip" class="form-label">Zip</label>
            <input type="text" class="form-control" id="inputZip">
          </div>
          <div class="col-12">
            <div class="form-check">
              <input class="form-check-input" type="checkbox" id="gridCheck">
              <label class="form-check-label" for="gridCheck">
                Check me out
              </label>
            </div>
          </div>
          <div class="col-12">
            <button type="submit" class="btn btn-primary">Sign in</button>
          </div>
        </form>
      </div>
    </div>
  </main>
  <footer></footer>
  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>
</html>