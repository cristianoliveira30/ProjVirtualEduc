/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * uma div e ocultar outra div. Esse evento vai acontecer, quando o botão for * clicado
*/

btn.addEventListener("click", function() {
    const btn = document.querySelector("#btn");
    const form1 = document.querySelector(".FromCadastro");
    const form2 = document.querySelector(".FromCadastro1");
    
    form1.style.display = "none";
    form2.style.display = "flex";
});

// Mascara para cpf

let btncpf = document.querySelector("#inputCPF");

btncpf.addEventListener("keyup", function() {
    let cpf = document.querySelector("#inputCPF");

    if (cpf.value.length == 3 || cpf.value.length == 7) {
        cpf.value += ".";
    } else if (cpf.value.length == 11) {
        cpf.value += "-";
    }
});

// Mascara Data

let iddata = document.querySelector("#data");

iddata.addEventListener("keyup", function() {
    let data = document.querySelector("#data");

    if (data.value.length == 2 || data.value.length == 5) {
        data.value += "/";
    }
});