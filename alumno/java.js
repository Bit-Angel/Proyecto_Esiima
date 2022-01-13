const calif = document.querySelector(".calificacion");
let aux=calif.textContent;
aux = Math.round(aux);
if(aux<=6){
    const contenedor = document.querySelector(".icono2");
    const contenedor2 = document.querySelector(".regular");
    img = "<img src='./imagenes/equis.png' class='icono_check' height='80px' width='80px'>";
    contenedor.innerHTML = img;
    contenedor2.textContent="Irregular";
}

calif.textContent=aux;
