/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * a janela modal. Esse evento acontecera, quando o botão for clicado
*/

const btn_evento = document.querySelector("#btn-submit");
btn_evento.addEventListener("click", clicar);

function clicar() {
    let janela = document.querySelector("#janela-modal");
    janela.classList.add("janela-modal")
}