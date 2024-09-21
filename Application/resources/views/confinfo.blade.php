<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>home</title>
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link rel="stylesheet" href="/assets/css/home.css">
	<link rel="stylesheet" href="/assets/css/home.scss">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	@component('components.head')
	@endcomponent
	<script src="{{ mix('js/app.js') }}" defer></script>
</head>
<body>
	@routes
	<header id="header">]
		@verbatim
		@endverbatim
	</header>

	<main>

    </main>

	<footer id="footer" class="bg-dark text-white pt-5 pb-4">
        @verbatim
        @endverbatim
    </footer>
</body>
</html>