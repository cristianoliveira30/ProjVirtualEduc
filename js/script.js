/*
 * Inicio do arquivo javascript
 * Galera esse arquivo é para trabalhar com as interatividades do site
 */

/* 
 * Estou criando um script para chamar 
 * a janela modal. Esse evento acontecera, quando o botão for clicado
*/

const btn = document.querySelector("#btn-submit");
const container = document.querySelector(".container1");
const btn = document.querySelector("#btn");
const abrir = document.querySelector(".modal");
btn.addEventListener('click', clicar);

btn.addEventListener("click", clicar);
function clicar() {
    if (container.style.display === "block") {
        container.style.display = "none"
    } else {
        container.style.display = "block"
    }
    if (abrir.style.display == "none") {
        abrir.style.display = "flex";
        window.alert("Oi")
    }
}