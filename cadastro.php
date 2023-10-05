<!DOCTYPE html>
<html lang="pt-BR">

<head>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
  <link rel="stylesheet" href="./css/cadastro.css">
  <link rel="stylesheet" href="./css/cadastro.scss"><!-- Arquivo para ajustar o select-->
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Cadastro</title>
</head>

<body class="bg-light">
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
  <main class="">
    <div class="">
      <form class="FormCadastro" action="./BEnd/valiusu.php" method="post" enctype="multipart/form">
        <!-- Etapa1 -->
        <div class="FromCadastro bg-dark-subtle rounded-4 border border-primary text-bg-dark-subtle position-absolute top-50 start-50 translate-middle p-0 row g-3" id="form1">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">Email</label>
            <input typgite="email" class="form-control" id="inputEmail4" name="email" placeholder="Seu E-mail">
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
            <input type="text" class="form-control" id="telefone" name="tel" placeholder="+55 (99) 99999-9999">
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
            <button type="button" id="btn" class="btn btn-primary" data-bs-dismiss="modal">Sign in</button>
          </div>
        </div>
        <!-- Etapa2 -->
        <div class="FromCadastro1 row g-3 bg-dark-subtle rounded-4 border border-primary text-bg-dark-subtle position-absolute top-50 start-50 translate-middle">
          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">CPF</label>
            <input type="email" class="form-control" id="inputCPF" name="email" placeholder="Seu CPF" maxlength="14">
          </div>
          <div class="col-md-6">
            <label for="inputPassword4" class="form-label">Data</label>
            <input type="text" class="form-control" id="data" name="data" placeholder="Data" maxlength="10">
          </div>

          <div class="col-md-6">
            <label for="inputEmail4" class="form-label">RG</label>
            <input type="email" class="form-control" id="inputCPF" name="email" placeholder="RG" maxlength="14">
          </div>

          <div class="col-md-6">
            <label for="inputCity" class="form-label">Telefone</label>
            <input type="text" class="form-control" id="telefone" name="tel" placeholder="+55 (99) 99999-9999" maxlength="12">
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
        </div>
      </form>
    </div>
    </div>
  </main>
  <footer>
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
  </footer>
  <!--bootstrap-->
<<<<<<< HEAD
  <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script> -->

=======
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
>>>>>>> 91aa181ed88c32d225bc7943ffc0d9462b7c2ee0
  <!-- link do arquivo js externo-->
  <script src="./js/script.js"></script>
</body>

</html>