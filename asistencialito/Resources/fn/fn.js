let elementoActual = '';

function cargarContenido(url, elementoId, mensajeError) {
    if (elementoActual && elementoActual !== elementoId) {
        document.getElementById(elementoActual).innerHTML = "";
    }

    elementoActual = elementoId;

    fetch(url)
        .then(res => res.text())
        .then(data => {
            document.getElementById(elementoId).innerHTML = data;
        })
        .catch(error => {
            console.error(`Error al cargar ${url}:`, error);
            document.getElementById(elementoId).innerHTML = `<p>${mensajeError}</p>`;
        });
}

function alumnos() {
    cargarContenido('mostrarAlumnos.php', 'alumnos_mostrar', 'Error al cargar los alumnos.');
}

function enviarYMostrarAsistencia() {
    document.getElementById('alumnos_mostrar').innerHTML = "";

    const form = document.querySelector('form');
    const formData = new FormData(form);

    fetch('Guardar/guardarAsistencias.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then(data => {
        console.log('Respuesta de guardarAsistencias.php:', data);
        mostrarAusentes();
    })
    .catch(error => {
        console.error('Error al guardar la asistencia:', error);
    });
}

function mostrarAlumnos() {
    cargarContenido('tomarAsistencia.php', 'mostrar_alumnos', 'Error al cargar los alumnos.');
}

function mostrarAusentes() {
    cargarContenido('mostrarAusentes.php', 'mostrar_ausentes', 'Error al cargar la lista de ausentes.');
}

function mostrarEstado() {
    cargarContenido('mostrarEstado.php', 'mostrar_estado', 'Error al cargar el estado.');
}

function notasAlumnos() {
    cargarContenido('notasAlumnos.php', 'notas_alumnos', 'Error al cargar las notas.');
}