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

btn.addEventListener("click", function () {
	etapa01.style.display = "none";
	etapa02.style.display = "block";

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

function openInNewTab(url) {
	const win = window.open(url, "_blank");
	win.focus();
};

btn_sair.addEventListener("click", () => {
	openInNewTab(url);
});