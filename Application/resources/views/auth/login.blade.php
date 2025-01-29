<!DOCTYPE html>
<html lang="pt-br">

<head>
    @component('components.head')
	@slot('defer')
		'defer'
	@endslot
	@endcomponent
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Login</title>
    <link rel="stylesheet" href="/assets/css/login.css">
</head>

<body class="d-grid">
    <main class="d-grid align-self-center">
        <div id="divFormLogin" class="mb-5 p-5 d-flex align-self-center justify-content-center">
        <!-- Entrará um form vue aqui -->
        </div>
    </main>

    <script src="/assets/js/script.js"></script>
</body>

</html>