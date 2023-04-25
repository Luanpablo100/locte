
function mudaHora() {
    //Obter a hora do sistema
    let DataAtual = new Date()
    let horaAtual = DataAtual.getHours()
    let minutoAtual = DataAtual.getMinutes()

    //Caso o minuto seja menor do que, ficaria como 10:6, então, adicione um "0" na frente, caso seja menor do que 10.
    if(minutoAtual < 10) {
        minutoAtual = "0" + minutoAtual
    }

    //Atribua a hora do sistema ao objeto relógio da página.
    let relogio = document.getElementById("relogio")
    relogio.innerText = `${horaAtual}:${minutoAtual}`
}

//Rode o update de hora a cada segundo.
setInterval(mudaHora, 1000)
