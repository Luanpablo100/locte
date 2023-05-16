let inputImagem = document.getElementById("input-car-img")
let imgCar = document.getElementById("img-car")

inputImagem.addEventListener("change", function() {
    const arquivoImagem = inputImagem.files[0];
    const urlImagem = URL.createObjectURL(arquivoImagem);
    imgCar.src = urlImagem;
});



