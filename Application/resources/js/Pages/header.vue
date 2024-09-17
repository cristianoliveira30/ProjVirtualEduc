<template>
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
                <div id="links" class="me-2">
                    <a class="btn btn-primary" :href="route('logout')" role="button">Logout</a>
                </div>
            </div>
        </div>
    </nav>
</template>

<script> export default { name: 'headercomponent'} </script>