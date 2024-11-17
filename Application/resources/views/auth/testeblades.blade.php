<!DOCTYPE html>
<html lang="pt-br">

<head>
    @component('components.head')
    @endcomponent
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teste de Blades</title>
    <link rel="stylesheet" href="/assets/css/testeblades.css">
    <link rel="stylesheet" href="/assets/css/home.css">
	</head>

<body>
    @routes
    <header id="header">
        @verbatim
        @endverbatim
    </header>

    <main id="">
        <button class="btn btn-primary" id="buttonaddform">próxima fase</button>
    </main>

    <footer id="footer" class="bg-dark text-white pt-5 pb-4">
        @verbatim
        @endverbatim
    </footer>
</body>

</html>
