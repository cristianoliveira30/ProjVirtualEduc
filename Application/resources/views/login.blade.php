<!DOCTYPE html>
<html lang="pt-br">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>Login</title>
	<link rel="icon" type="image/x-icon" href="/favicon.ico">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<link rel="stylesheet" href="/assets/css/login.css">
	<link rel="stylesheet" href="/assets/css/login.scss">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4=" crossorigin="anonymous"></script>
</head>
<body>
	<main>
		<div class="login-card mb-5 p-5 position-absolute top-50 start-50 translate-middle">
			<div class="card-header">
				<div class="log">Login</div>
			</div>
			<form class="login" method="post" enctype="multipart/form" id="login">
			@csrf
				<div class="form-group">
					<label for="email">Email:</label>
					<input required="" name="email" id="email" type="email" maxlength="50">
				</div>
				<div class="form-group">
					<label for="password">Senha:</label>
					<input required="" name="password" id="password" type="password" minlength="6">
				</div>
				<div class="form-group">
					<button id="buttonLogin" type="submit">Entrar</button>
				</div>
			</form>
		</div>
	</main>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
	<script src="/assets/js/script.js"></script>
</body>
</html>

<script>
	// $.ajaxSetup({
    //     headers: {
    //         'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
    //     }
    // });

	$('#login').on('submit', function(event){
		event.preventDefault();

		// Abre o SweetAlert de carregamento
		Swal.fire(
		{
			title: 'Carregando...',
			html: 'Por favor, aguarde.',
			allowOutsideClick: false,
			didOpen: () => {
				Swal.showLoading();
			}
		});

		// Serializa o formulário em um objeto
		const formDataObject = {};
		$(this).serializeArray().forEach(function(field) 
		{
			formDataObject[field.name] = field.value;
		});

		const link = "{{ route('login.action') }}";

		// Converte o objeto em JSON
		const jsonData = JSON.stringify(formDataObject);

		$.ajax(
		{
			url: link,
			type: 'POST',
			contentType: 'application/json',
			data: jsonData,
			dataType: 'json',
			success: function(response) 
			{
				// Fecha o SweetAlert de carregamento
				Swal.close();

				// Verifica se a resposta é verdadeira
				if (response) 
				{
					// Abre notificação de sucesso
					Swal.fire({
						icon: "success",
						title: "Concluído",
						text: "Login bem sucedido!"
					}).then(() => {
						// Redireciona para a nova página
						window.location.href = response.redirect;
					});
				} 
				else 
				{
					// Exibe um SweetAlert de erro se a resposta não for verdadeira
					Swal.fire({
						icon: 'error',
						title: 'Login maldoso ou inválido!',
						text: 'Algo deu errado com seu login. Por favor, tente novamente.'
					});
				}
			},
			error: function(jqXHR, textStatus, errorThrown) {
				// Fecha o SweetAlert de carregamento
				Swal.close();
				// Abre notificação de erro
				Swal.fire({
					icon: "error",
					title: "Algo deu errado!",
					text: "Tente novamente mais tarde."
				});
				console.error('Erro:', textStatus, errorThrown);
				console.error('Resposta do servidor:', jqXHR.responseText);
			}
		});
	});
</script>