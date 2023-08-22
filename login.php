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
                      <li><hr class="dropdown-divider"></li>
                      <li><a class=" link-light dropdown-item" href="#">Something else here</a></li>
                    </ul>
                  </li>
                  <li class="nav-item">
                    <a class=" link-light nav-link disabled" aria-disabled="true">Acessar Conteúdo</a>
                  </li>
                </ul>
                <div name="buttons" class="position-absolute end-0 me-4">
                  <a class=" link-light btn btn-primary" href="#" role="button">Cadastre-se</a>
                  <a class=" link-light btn btn-info" href="#" role="button">Entrar</a>
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
    
</body>
</html>