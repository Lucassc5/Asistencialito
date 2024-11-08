function alumnos() {
        
    fetch('mostrarAlumnos.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('alumnos_mostrar').innerHTML =  data;  
                 
        })
        .catch(error => {
            console.error('Error al cargar los alumnos:', error);
            document.getElementById('alumnos_mostrar').innerHTML = "<p>Error al cargar los alumnos.</p>";
        });
        
}