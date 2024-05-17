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
	<!-- Google fonts -->
	<link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Material+Symbols+Outlined:opsz,wght,FILL,GRAD@20..48,100..700,0..1,-50..200" />
	<!-- Ajax awesome -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css">
	<!-- Jquery validate plugin -->
	<script src="js/jquery.validate.min.js"></script>
</head>
<body>
	<main>
		<div class="container-fluid" id="form">
			<form class="login-card mt-5 mb-5 p-5" method="post" enctype="multipart/form" id="cadastro">
				<div class="card-header">
					<div class="log">Cadastro</div>
				</div>
				<div class="etapa01" id="etapa01">
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="email">Email</label></div>
							<input required="" name="email" id="email" type="text" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="senha">Senha</label></div>
							<input required="" name="senha" id="senha" type="password" maxlength="8">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="nomeusu">Nome de Usuário</label></div>
							<input required="" name="nomeusu" id="nomeusu" type="text" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="nomecomp">Nome Completo</label></div>
							<input required="" name="nomecomp" id="nomecomp" type="text" maxlength="50">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<div class="d-block"><label for="telefone">Telefone</label></div>
							<input required="" name="telefone" id="telefone" type="text" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block">
								<label for="escolaridade">Escolaridade</label>
							</div>
							<select name="escolaridade" id="escolaridade">
								<option value="Escolaridade" selected></option>
								<option value="Fundamental">Fundamental</option>
								<option value="Médio">Médio</option>
								<option value="Superior">Superior</option>
							</select>
						</div>
					</div>
					<div class="form-group">
						<input type="checkbox" id="checbox-termos">
						<a href="#" class=" m-2"><label for="">Li e concordo com os termos!</label></a>
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
							<div class="d-block"><label for="password">Data de Nascimento</label></div>
							<input required="" type="text" name="nascimento" id="nascimento" maxlength="8">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<label for="rg">RG</label>
							<input required="" type="text" name="rg" id="rg" maxlength="7">
						</div>
						<div class="form-group">
							<label for="endereco">Endereço</label>
							<input required="" type="text" name="endereco" id="endereco" maxlength="50">
						</div>
					</div>
					<div class="d-flex">
						<div class="form-group">
							<label for="cep">CEP</label>
							<input required="" type="text" name="cep" id="cep" maxlength="50">
						</div>
						<div class="form-group">
							<div class="d-block"><label for="estado">Estado</label></div>
							<select name="unidades-federativas" id="estados">
								<option selected>Selecionar Estado</option>
								<option>AC </option>
								<option>AL </option>
								<option>AP </option>
								<option>AM </option>
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
							</select>
						</div>
					</div>
					<div class="form-group">
						<input id="enviarcadastro" value="Enviar" type="submit">
					</div>
					<div class="form-group text-center ">
						<button type="button" class="btn btn-primary border-0 w-25 rounded-1 p-1 mt-2" id="voltar-para-o-form1">Voltar</button>
					</div>
					<div class="form-group text-center ">
						<button type="button" class="btn btn-primary border-0 w-25 rounded-1 p-1 mt-2" id="voltar-para-o-form1">Voltar</button>
					</div>
				</div>
			</form>
		</div>
	</main>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	<script src="./js/script.js"></script>

</body>
</html>

<script>
	//enviando informações
	$('#cadastro').on('submit', function(event) 
	{
	event.preventDefault();

	// Serializa o formulário em um objeto
	const formDataObject = {};
	$(this).serializeArray().forEach(function(field) {
		formDataObject[field.name] = field.value;
	});

	// Converte o objeto em JSON
	const jsonData = JSON.stringify(formDataObject);

	// Envia a requisição AJAX com os dados em JSON
	$.ajax(
	{
		url: './BEnd/tratamentocadastro.php',
		type: 'POST',
		contentType: 'application/json',
		data: jsonData,
		dataType: 'json',
		success: function(response) {
			console.log(response);
		},
		error: function(jqXHR, textStatus, errorThrown) {
			console.error('Erro:', textStatus, errorThrown);
			console.error('Resposta do servidor:', jqXHR.responseText);
		}
	});
	});
	$(document).ready(function() 
	{
	//Máscaras de inputs
	$("#telefone").mask("(00) 00000-0000");
	$("#cpf").mask("000.000.000-00");
	$("#nascimento").mask("00/00/0000");
	$("#cep").mask("00000-000");

	$("#email").validate({
		rules: {
			email: {
				required: true,
				maxlength: 100,
				minlegth: 10
			}
		}
	});

	// Função para aceitar apenas valores numericoss
	const input = $('#rg');
	input.on('input', function() {
		input.val(input.val().replace(/[^0-9]/g, ''));
	});

	});
</script>