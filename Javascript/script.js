/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * a janela modal. Esse evento acontecera, quando o botão for clicado
*/


// scripts do Luke

/*
 *Luke, aparentemente o problema com o arquivo js foi resolvido. Agora podemos *usar javascript em um arquivo externo. Sem a necessidade poluir o html
 */

// Event listener para detectar quando o conteúdo da página foi carregado

/*window.addEventListener("load", function() {
    var boxad = document.getElementById("boxad");
    boxad.style.display = "none"; // Oculta o spinner
});*/

// Simula atraso para interromper o carregamento após um tempo
/*setTimeout(function() {
    var boxad = document.getElementById("boxad");
    boxad.style.display = "none"; // Oculta o spinner
}, 5000); */

// Interrompe o carregamento após 5 segundos (ajuste conforme necessário)



btn.addEventListener("click", function() {
    const btn = document.querySelector('#btn');
    const form1 = document.querySelector('.FromCadastro');
    const form2 = document.querySelector('.FromCadastro1');
    
    form1.style.display = "none";
    form2.style.display = "block";
});

