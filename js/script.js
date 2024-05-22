/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * uma div e ocultar outra div. Esse evento vai acontecer, quando o botão for * clicado
*/

const btn = document.querySelector("#btn");
const etapa01 = document.querySelector(".etapa01");
const etapa02 = document.querySelector(".etapa02");
const form = document.querySelector("#cadastro");
const email_input = document.querySelector("#email");
const senha_input = document.querySelector("#senha");
const name_user_input = document.querySelector("#nomeusu");
const namecompleto_input = document.querySelector("#nomecomp");
const telefone_input = document.querySelector("#telefone");
const escolaridade = document.querySelector("#escolaridade");

btn.addEventListener("click", (event) => {

	event.preventDefault();

	// Verificar se o campo está vazio
	if (email_input.value === "") {
		alert("Por favor, Preencha o campo Email");
		return;
	}

	if (senha_input.value === "") {
		alert("Por favor, Preencha o senha");
		return;
	}

	if (name_user_input.value === "") {
		alert("Por favor, Preencha o campo Nome de usuário")
		return;
	}

	if (namecompleto_input.value === "") {
		alert("Por favor, Preencha o campo Nome completo");
		return;
	}

	if (telefone_input.value === "") {
		alert("Por favor, Preencha o campo Telefone");
		return;
	}

	if (escolaridade.value === "Fundamental" || escolaridade.value === "Médio" || escolaridade.value === "Superior") {

		valid = false
		if (document.querySelector("#checbox-termos").checked) {
			valid = true;
		}
		if (valid) {
			etapa01.style.display = "none";
			etapa02.style.display = "block";
		} else {
			alert("Marque à caixa, Li e concordo com os termos");
		}

	} else {
		alert("Por favor, Marque o campo Escolaridade");
		return;
	}

});

//se o useragente for mobile vai retornar true

function isMobile() {
	return /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
	return true;
}

// const form = document.querySelector("#cadastro");
// const email = document.querySelector("#inputEmail");

// form.addEventListener("submit", (event) => {
// 	event.preventDefault();

// 	if (email.value === "") {
// 		alert("Preencha o campo Email");
// 		return;
// 		form.submit();
// 	}
// });

const url = "login.php";
const btn_sair = document.querySelector("#btn-sair");

// function openInNewTab(url) {
// 	const win = window.open(url, "_blank");
// 	win.focus();
// };

// btn_sair.addEventListener("click", () => {
// 	openInNewTab(url);
// });

// Script do botão, voltar para o formulario 01

const btn_voltar = document.querySelector("#voltar-para-o-form1");

btn_voltar.addEventListener("click", function () {
	etapa02.style.display = "none";
	etapa01.style.display = "block";
});