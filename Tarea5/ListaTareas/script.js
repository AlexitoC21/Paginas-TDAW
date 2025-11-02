/*
Se obtienen referencias a los elementos del DOM que necesitaás manipular,
como el campo de entrada de texto, el botón de agregar tarea y la lista de tareas. 
*/
const entradaTarea = document.getElementById("tarea");
const botonTarea = document.getElementById("agregarTarea");
const listaTareas = document.getElementById("listaTareas");

/*
Esta función toma el texto del capo de entrada, crear un nuevo
elemento de lista (<li>) y lo agrega a la lista de tareas.
*/

function agregarElemento(){
    const textoTarea = entradaTarea.value;

    if(textoTarea.trim() !== ""){
        const nuevaTarea = document.createElement("li");
        nuevaTarea.textContent = textoTarea;

        listaTareas.appendChild(nuevaTarea);

        /* Punto 3 -> Boton de completado */
        const botonCompletado = document.createElement("button");
        botonCompletado.textContent = "Marcar tarea completa";
        botonCompletado.onclick = function(){
            if(botonCompletado.textContent === "Marcar tarea completa"){
                nuevaTarea.style.textDecoration = "line-through";
                botonCompletado.textContent = "Desmarcar tarea";
            }else{
                nuevaTarea.style.textDecoration = "none";
                botonCompletado.textContent = "Marcar tarea completa";
            }
            
        }
        nuevaTarea.appendChild(botonCompletado);

        /* Punto 4 -> Boton de eliminar tarea */
        const botonEliminar = document.createElement("button");
        botonEliminar.textContent = "Eliminar tarea";
        botonEliminar.onclick = function(){ nuevaTarea.remove()}
        nuevaTarea.appendChild(botonEliminar);

        /* Punto 5 -> Eliminar campo de entrada */
        entradaTarea.value = "";
    }
}

/* Se agrega un listener para el boton */
botonTarea.addEventListener("click",agregarElemento);

