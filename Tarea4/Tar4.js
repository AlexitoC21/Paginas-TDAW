//1
function modificarTexto(){
    document.getElementById('Cambiar_texto').innerHTML = 'Texto modificado con js';
}

//2
const entradaLista = document.getElementById("addLista");
const AnadirALista = document.getElementById("Agregar_lista");
const lista = document.getElementById("lista");

AnadirALista.addEventListener("click", function() {
    const texto = entradaLista.value.trim();

    if (texto === "") {
        return;
    }

    const nuevoElemento = document.createElement("li");
    nuevoElemento.textContent = texto;
    lista.appendChild(nuevoElemento);

    entradaLista.value = "";
    entradaLista.focus();
});

//3
const textoOculto = document.getElementById("oculto");

function ocultarTexto(){
    if(textoOculto.style.display === "none"){
        textoOculto.style.display = "block";
    }else{
        textoOculto.style.display = "none";
    }
}

//4
function cambiarColor(){
    if(colorines.style.color === "none" || colorines.style.color === "blue"){
        colorines.style.color = "red";
    }else if(colorines.style.color === "red"){
        colorines.style.color = "green";
    }else{
        colorines.style.color = "blue";
    }
}

//5
let total_clicks = 0;
function clickCounter(){
    total_clicks++;
    count.textContent = `Total de clicks: ${total_clicks}`;
}

//6
function validarForm(){
    event.preventDefault();

    const nombre = document.getElementById("nombre").value.trim();
    const mensaje = document.getElementById("mensajeFormulario");

    if (nombre === "") {
        mensaje.textContent = "No llenaste el formulario pa";
        mensaje.style.color = "red";
    }else{
        mensaje.textContent = 'Formulario enviado correctamente.';
        mensaje.style.color = "green";

        document.getElementById("nombre").value = "";
    }
}