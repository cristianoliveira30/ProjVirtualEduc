/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * uma div e ocultar outra div. Esse evento vai acontecer, quando o botão for * clicado
*/

const etapa01 		= $(".etapa01");
const etapa02 		= $(".etapa02");
const form 			= $("#cadastro");
var valid			= false;

$('#proxform').on("click", function(event)  
{
	
	const email 		= $("#email").val();
	const senha 		= $("#password").val();
	const nameUser 		= $("#nomeusu").val();
	const namecompleto 	= $("#nomecomp").val();
	const telefone 		= $("#telefone").val();
	const escolaridade 	= $("#escolaridade").val();
	
	event.preventDefault();

	// Verificar se o campo está vazio
	if (!email) {
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor preencha o campo Email'
		});
	}

	if (!senha) {
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor preencha o senha'
		});
	}

	if (!nameUser) {
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor preencha o campo Nome de usuário'
		});
	}

	if (!namecompleto) {
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor preencha o campo Nome completo'
		});
	}

	if (!telefone) {
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor preencha o campo Telefone'
		});
	}

	if (!escolaridade == "Fundamental" || !escolaridade == "Médio" || !escolaridade == "Superior") 
	{
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor marque o campo Escolaridade'
		});
	}

	if (!$("#checbox-termos").is(':checked')) 
		{
		Swal.fire({
			icon: 'error',
			title: 'Erro!',
			text: 'Por favor aceite os termos de serviços.'
		})
	}

	validacoes = [
		email,
		senha,
		nameUser,
		namecompleto,
		telefone,
		escolaridade
	]

	function isNotEmpty(element) {
        return $.trim(element) !== '';
    }

    var valid = validacoes.every(isNotEmpty);

	if (valid) 
	{
		etapa01.css("display", "none");
		etapa02.css("display", "block");
	}
});

function isMobile() {
	return /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
	return true;
}

const url = "login.php";
const btn_sair = $("#btn-sair");

const btn_voltar = $("#voltar-para-o-form1");

btn_voltar.on("click", function () 
{
	etapa02.style.display = "none";
	etapa01.style.display = "block";
});