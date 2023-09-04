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
    <div class="container0 FromCadastro bg-dark-subtle rounded-4 top-50 start-50 border border-primary text-bg-dark-subtle d-inline-block p-3">
      <form class="container0 FormCadastro row g-3" action="./BEnd/configBD.php" method="post" enctype="multipart/form">
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
          <select id="inputState" class="form-selecting bordder border-secundary" name="escolaridade">
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
    <div class="container d-none">
      <iframe src="form1.php" frameborder="0"></iframe>
    </div>
  </main>
  <footer></footer>
  <!--bootstrap-->
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
  <script src="./js/script.js"></script>
</body>
</html>