// Variables con las rutas de nuestros archivos del back-end
// Introducir vuestra ruta ántes de /php/...

const urlAgregarContenido = "http://localhost/2DAM/Primer%20trimestre/API-MySQL-PHP-ForBeginners/php/agregarContenido.php"
const urlEditarContenido = "http://localhost/2DAM/Primer%20trimestre/API-MySQL-PHP-ForBeginners/php/editarContenido.php"
const urlBorrarContenido = "http://localhost/2DAM/Primer%20trimestre/API-MySQL-PHP-ForBeginners/php/borrarContenido.php"
const urlObtenerContenido = "http://localhost/2DAM/Primer%20trimestre/API-MySQL-PHP-ForBeginners/php/obtenerContenido.php"

// Variable donde almacenaremos la lista de contenidos

let listaContenidos = []

// Objeto con los atributos vacios, que rellenaremos con los datos introducidos en el formulario
// que posteriormente introduciremos en la base de datos

const objContenido = {
    id: "",
    nombre: "",
    apellidos: "",
    edad: "",
    altura: ""
}

// Booleano que nos informará de si se está editando el contenido, si no es cierto la veremos como false

let editando = false

// Variable que localiza el elemento HTMl del formulario

const formulario = document.querySelector("#form")

// Variables que localizan todos los elementos del formulario

const nombreForm = document.querySelector("#nombre")
const apellidosForm = document.querySelector("#apellidos")
const edadForm = document.querySelector("#edad")
const alturaForm = document.querySelector("#altura")

// Cuando se haga el submit de los datos del formulario se activara la función validar
formulario.addEventListener('submit', validar)

// La funcióm recibirar un evento
function validar(e){
    // Evitamos que se ejecute de forma automatica, solo cuando pulsemos el botón
    e.preventDefault()

    //Con este condicional nos aseguramos de que se rellenen todos los campos
    if([nombreForm.value, apellidosForm.value, edadForm.value, alturaForm.value].includes('')){
        // Si cualquiera de los campos esta vacio, es decir, esté compuesto por un hueco vacio, imprimiremos el siguiente mensaje
        alert("Es necesario rellenar todos los campos")
        return
    }

    // Si estamos en modo editar invocamos a la función de editar, en caso contrario a la de añadir contenido
    if(editando == true){
        editarContenido()
        editando = false
    }else{
        objContenido.id = Date.now()
        objContenido.nombre = nombreForm.value
        objContenido.apellidos = apellidosForm.value
        objContenido.edad = edadForm.value
        objContenido.altura = alturaForm.value

        agregarContenido()
    }
}

// Funcion para enseñar los datos de la base de datos

async function obtenerContenido(){

    // Mete en la lista los datos extraidos del back-end
    // Convertimos la respuesta en un json de los datos
    // Si hay un error se imprimirá en consola
    listaContenidos = await fetch(urlObtenerContenido)
    .then(respuesta => respuesta.json())
    .then(datos => datos)
    .catch(error => alert(error))

    mostrarContenidos()
}

obtenerContenido()

// Función que mostrará los datos en el div seleccionado

function mostrarContenidos(){

    // Creamos una variable que localice el div donde queremos imprimir los datos
    const divContenido = document.querySelector(".contenidos")

    // Recorremos el listado 
    listaContenidos.forEach(contenido => {
        const {id,nombre,apellidos,edad,altura} = contenido

        // Creamos un parrafo para visualizar los elementos del contenido
        const parrafo = document.createElement('p')
        parrafo.textContent = `${id}. Nombre: ${nombre} ${apellidos} / Edad: ${edad} / Altura(cm): ${altura} `
        parrafo.dataset.id = id

        // Creamos el botón para editar los datos 
        const btnEditar = document.createElement('button')
        btnEditar.onclick = ()=> cargarContenido(contenido)
        btnEditar.textContent = "Editar"
        parrafo.append(btnEditar)

        // Creamos el botón para eliminar los datos
        const btnEliminar = document.createElement('button')
        btnEliminar.onclick = ()=> eliminarContenido(id)
        btnEliminar.textContent = "Eliminar"
        parrafo.append(btnEliminar)
        

        // Cremos una separación
        const hr = document.createElement('hr')

        // Vamos a agregar el parrafo y la separación a nuesto elemento padre, en este caso el div de contenido
        divContenido.appendChild(parrafo)
        divContenido.appendChild(hr)
    })
}

//Función que añadirá contenido a la base de datos
async function agregarContenido(){

    // Respuesta de lo que nos devuelva la petición a nuestro back-end
    const res = await fetch(urlAgregarContenido,{
        method: 'POST',
        // Enviaremos un JSON de nuestro objeto contenido
        body: JSON.stringify(objContenido)
    })
    .then(respuesta => respuesta.json)
    .then(data => data)
    .catch(error => alert(error))

    // Si todo sale bien a la hora de introducir los datos, nos borrará el listado para volver a escribir los datos

    if(res.msg === 'OK'){
        alert("Se añadió el contenido con éxito")
        // Nos borrará el listado para volver a imprimir el contenido, si no se podrá repetir el contenido en la lista
        limpiarHTML()
        obtenerContenido()

        // Limpia los valores de los campos imput y vacia el objContenido para que pueda insertar nuevos datos de forma limpia
        formulario.reset()
        limpiarObjeto()
    }
}

// Introducirá los datos editados de un contenido existente a la base de datos

async function editarContenido(){

    // Recibimos los valores de los inputs
    objContenido.nombre = nombreForm.value
    objContenido.apellidos = apellidosForm.value
    objContenido.edad = edadForm.value
    objContenido.altura = alturaForm.value

    // Respuesta de lo que nos devuelva la petición a nuestro back-end
    const res = await fetch(urlEditarContenido,{
        method: 'POST',
        // Enviaremos un JSON de nuestro objeto contenido
        body: JSON.stringify(objContenido)
    })
    .then(respuesta => respuesta.json)
    .then(data => data)
    .catch(error => alert(error))

    //  Si todo sale bien a la hora de introducir los datos, nos borrará el listado para volver a escribir los datos
    if(res.msg === 'OK'){
        alert("Se editó el contenido con éxito")
        // Nos borrará el listado para volver a imprimir el contenido, si no se podrá repetir el contenido en la lista
        limpiarHTML()
        obtenerContenido()

        // Limpia los valores de los campos imput y vacia el objContenido para que pueda insertar nuevos datos de forma limpia
        formulario.reset()
        limpiarObjeto()
    }

    // Cambiar el botón para que diga añadir de nuevi

    formulario.querySelector('button[type="submit"').textContent = "Añadir"
    editando = false

}

async function eliminarContenido(id){

    // Respuesta de lo que nos devuelva la petición a nuestro back-end
    const res = await fetch(urlBorrarContenido,{
        method: 'POST',
        // Enviaremos un JSON de nuestro objeto contenido
        body: JSON.stringify({'id':id})
    })
    .then(respuesta => respuesta.json)
    .then(data => data)
    .catch(error => alert(error))

    if(res.msg === 'OK'){
        alert("Se eliminó el contenido con éxito")
        // Nos borrará el listado para volver a imprimir el contenido, si no se podrá repetir el contenido en la lista
        limpiarHTML()
        obtenerContenido()

        // Vacia el objContenido para que pueda insertar nuevos datos de forma limpia
        limpiarObjeto()
    }
}

// Nos cargará los datos del contenido seleccionado con el botón editar en los campos a rellenar, donde podremos editarlos 
function cargarContenido(contenido){
    const {id,nombre,apellidos,edad,altura} = contenido
    nombreForm.value = nombre
    apellidosForm.value = apellidos
    edadForm.value = edad
    alturaForm.value = altura

    objContenido.id = id

    // Cambiar el botón para que diga actualizar

    formulario.querySelector('button[type="submit"').textContent = "Actualizar"
    editando = true
}

function limpiarHTML(){
    const divContenido = document.querySelector(".contenidos")
    // Mientras que el div tenga hijos, es decir contenido, lo limpiará
    while(divContenido.firstChild){
        divContenido.removeChild(divContenido.firstChild)
    }
}

function limpiarObjeto(){
    objContenido.id = ""
    objContenido.nombre = ""
    objContenido.apellidos = ""
    objContenido.edad = ""
    objContenido.altura = ""
}