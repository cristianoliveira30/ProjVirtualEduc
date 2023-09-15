/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * a janela modal. Esse evento acontecera, quando o botão for clicado
*/

btn.addEventListener('click', function() {
    const btn = document.querySelector('#btn');
    const form1 = document.querySelector('.FromCadastro');
    const form2 = document.querySelector('.FromCadastro1');
    
    form1.style.display = 'none';
    form2.style.display = 'block';
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

// Mascara Telefone

let input_tel = document.querySelector("#telefone");

input_tel.addEventListener("click", function() {
    let telefone = document.querySelector("#telefone");

    if (telefone.value.length == 0) {
        telefone.value += "(  )";
    } else if (telefone.value.length == 3) {
        telefone
    }
});