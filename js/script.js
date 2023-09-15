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

const cpf = document.querySelector('#inputCPF');

cpf.addEventListener('keypress', function() {
    let cpflength = cpf.value.legth;

    if ((cpflength === 3) || (cpflength === 7) || (cpflength === 10)) {
        cpf.value += '.';
    }
});