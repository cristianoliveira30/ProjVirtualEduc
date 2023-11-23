<!DOCTYPE html>
<html lang="pt-br">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Cadastro</title>
	<!-- link para o bootstrap 5 -->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
	<!-- Referente aos aquivos css -->
	<link rel="stylesheet" href="./css/cadastro.css">
	<link rel="stylesheet" href="./css/cadastro.scss">
	<!-- link para a biblioteca Jquery -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.7.1/jquery.min.js"></script>
	<!-- link Jquery mask plugin -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.min.js"></script>
	<!-- link Jquery validate plugin -->
	<script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.5/dist/jquery.validate.js"></script>
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
</head>
<body>
	<main>
		<div class="container-fluid" id="form">
			<form class="login-card mt-5 mb-5 p-5" action="./BEnd/valiusu.php" method="post" enctype="multipart/form" id="cadastro">
				<div class="card-header">
					<div class="log">Cadastro</div>
				</div>
				<div class="etapa01" id="etapa01">
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="username">Email</label></div>
							<input required="" name="username" id="username" type="text" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="password">Senha</label></div>
							<input required="" name="password" id="password" type="password" maxlength="8">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="username">Nome de Usuário</label></div>
							<input required="" name="username" id="username" type="text" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="username">Nome Completo</label></div>
							<input required="" name="username" id="username" type="text" maxlength="50">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="username">Telefone</label></div>
							<input required="" name="username" id="telefone" type="text" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="username">Serie</label></div>
							<input list="escolaridade" name="escolaridade">
							<datalist id="escolaridade">
								<option value="Ensino Fundamental Incompleto"></option>
								<option value="Ensino Fundamental Completo"></option>
								<option value="Ensino Médio Incompleto"></option>
								<option value="Ensino Médio Completo"></option>
								<option value="Ensino Superior Incompleto"></option>
								<option value="Ensino Superior Completo"></option>
							</datalist>
						</div>
					</div>
					<div class="form-group">
							<input type="checkbox">
							<a href="#" class=" m-2"><label for="">Li e concordo com os termos!</label></a>
						</label>

					</div>
					<div class="form-group">
						<input value="Enviar" type="button" id="btn">
					</div>
				</div>

				<!-- Etapa02 -->

				<div class="etapa02">
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="username">CPF</label></div>
							<input required="" type="text" name="cpf" id="cpf" maxlength="14">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="password">Data</label></div>
							<input required="" type="text" name="data" id="data" maxlength="8">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<label for="username">RG</label>
							<input required="" type="text" name="username" id="rg" maxlength="7">
						</div>
						<div class="form-group">
							<label for="username">Endereço</label>
							<input required="" type="text" name="endereço" id="endereço" maxlength="50">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<label for="username">CEP</label>
							<input required="" type="text" name="cep" id="cep" maxlength="50">
						</div>
						<div class="form-group">
							<label for="username">Estado</label>
							<input list="estado">
							<datalist id="estado">
								<option>AC </option>
								<option>AL </option>
								<option>AP </option>
								<option>AM </options>
								<option>BA </option>
								<option>CE </option>
								<option>DF </option>
								<option>ES </option>
								<option>GO </option>
								<option>MA </option>
								<option>MT </option>
								<option>MS </option>
								<option>MG </option>
								<option>PA </option>
								<option>PB </option>
								<option>PR </option>
								<option>PE </option>
								<option>PI </option>
								<option>RJ </option>
								<option>RN </option>
								<option>RS </option>
								<option>RO </option>
								<option>RR </option>
								<option>SC </option>
								<option>SP </option>
								<option>SE </option>
								<option>TO </option>
							</datalist>
						</div>
					</div>
					<div class="form-group">
						<input value="Enviar" type="submit">
					</div>
				</div>
			</form>
		</div>
	</main>

	<script>
		
		// Mascaras de input com a biblioteca jQuery

		$(document).ready(function() {

			$("#telefone").mask("(00) 00000-0000");
			$("#cpf").mask("000.000.000-00");
			$("#data").mask("00/00/0000");
			$("#cep").mask("00000-000");

			// Função para aceitar apenas valores numericoss

			const input = $('#rg');
			input.on('input', function() {
				input.val(input.val().replace(/[^0-9]/g, ''));
			});

		});

	</script>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

	<script src="./js/script.js"></script>

</body>
</html>