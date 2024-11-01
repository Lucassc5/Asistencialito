function notasAlumnos() {
    document.getElementById('mostrar_alumnos').innerHTML = "";
    fetch('notasAlumnos.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('notas_alumnos').innerHTML =  data;  
        })
        .catch(error => {
            console.error('Error al cargar las notas:', error);
            document.getElementById('notas_alumnos').innerHTML = "<p>Error al cargar las notas.</p>";
        });
}