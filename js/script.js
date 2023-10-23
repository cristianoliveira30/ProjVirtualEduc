/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * uma div e ocultar outra div. Esse evento vai acontecer, quando o botão for * clicado
*/

let btn = document.querySelector("#btn");
btn.addEventListener("click", function () {
    let FromCadastro = document.querySelector(".FromCadastro");
    let FromCadastro1 = document.querySelector(".FromCadastro1");

    FromCadastro.style.display = "none";
    FromCadastro1.style.display = "flex";
});

// Mascara para cpf

let btncpf = document.querySelector("#inputCPF");

btncpf.addEventListener("keyup", function () {
    let cpf = document.querySelector("#inputCPF");

    if (cpf.value.length == 3 || cpf.value.length == 7) {
        cpf.value += ".";
    } else if (cpf.value.length == 11) {
        cpf.value += "-";
    }
});

// Mascara Data

let iddata = document.querySelector("#data");

iddata.addEventListener("keyup", function () {
    let data = document.querySelector("#data");

    if (data.value.length == 2 || data.value.length == 5) {
        data.value += "/";
    }
});

//se o useragente for mobile vai retornar true
function isMobile() {
    return /Android|iPhone|iPad|iPod/i.test(navigator.userAgent);
    return true;
}