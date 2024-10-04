function mostrarAlumnos() {
    fetch('traerAlumnos.php')
        .then(response => response.text())
        .then(data => {
            document.getElementById('mostrar').innerHTML =  data;  
        })
        .catch(error => {
            console.error('Error al cargar los alumnos:', error);
            document.getElementById('mostrar').innerHTML = "<p>Error al cargar los alumnos.</p>";
        });
}

