<!DOCTYPE html>
<html lang="pt-br">

<head>
    @component('components.head')
    @slot('defer')
        'defer'
    @endslot
    @endcomponent
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Teste de Blades</title>
    <link rel="stylesheet" href="/assets/css/testeblades.css">
    <link rel="stylesheet" href="/assets/css/home.css">
	</head>

<body>
    @routes
    <header>
        @component('../components.header')
        @endcomponent
    </header>

    <main id="">
        <button class="btn btn-primary"
         id="buttonaddform"
         style="position: absolute; top:15%;">próxima fase</button>
    </main>
</body>

</html>
