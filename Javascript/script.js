/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * a janela modal. Esse evento acontecera, quando o botão for clicado
*/

/*const btn = document.querySelector("#btn-submit");
const container = document.querySelector(".container1");
btn.addEventListener('click', clicar);

btn.addEventListener("click", clicar);
function clicar() {
    if (container.style.display === "block") {
        container.style.display = "none";
    } else {
        container.style.display = "block";
    }
}*/

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

let btn = document.querySelector("#btn");
let container0 = document.querySelector(".FromCadastro1");
let container1 = document.querySelector(".FromCadastro1");

btn.addEventListener("click", function() {
    container0.style.display = 'none';
});