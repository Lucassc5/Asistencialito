function mostrarEstado() {
    
    fetch('mostrarEstado.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('mostrar_estado').innerHTML =  data;  
            
        })
        .catch(error => {
            console.error('Error al cargar los alumnos:', error);
            document.getElementById('mostrar_estado').innerHTML = "<p>Error al cargar los alumnos.</p>";
        });
}