function enviarYMostrarAsistencia() {
    const form = document.querySelector('form');
    const formData = new FormData(form);

    fetch('Guardar/guardarAsistencias.php', {
        method: 'POST',
        body: formData
    })
    .then(response => response.text())
    .then((data) => {
        console.log('Respuesta de guardarAsistencias.php:', data); // Verifica la respuesta
        mostrarAusentes();
    })
    .catch(error => {
        console.error('Error al guardar la asistencia:', error);
    });
}

function mostrarAusentes() {
    fetch('mostrarAusentes.php')
        .then(response => response.text())
        .then(data => {
            console.log('Respuesta de mostrarAusentes.php:', data); // Verifica la respuesta
            document.getElementById('mostrar_ausentes').innerHTML = data;  
        })
        .catch(error => {
            console.error('Error al cargar la lista de ausentes:', error);
            document.getElementById('mostrar_ausentes').innerHTML = "<p>Error al cargar la lista de ausentes.</p>";
        });
}
