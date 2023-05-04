let menuHamburguer = document.getElementById("div-menu-hamburguer")
let closeMenuLateral = document.getElementById("closeMenu")

let menuLateral = document.getElementById("asideMenu")


menuHamburguer.addEventListener("click", () => {
    menuLateral.classList.toggle("hidden")
})

closeMenuLateral.addEventListener("click", () => {
    menuLateral.classList.toggle("hidden")
})






