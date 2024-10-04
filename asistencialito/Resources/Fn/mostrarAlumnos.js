function mostrarAlumnos() {
    fetch('traerAlumnos.php')
        .then(res => res.text())
        .then(data => {
            document.getElementById('mostrar_alumnos').innerHTML =  data;  
        })
        .catch(error => {
            console.error('Error al cargar los alumnos:', error);
            document.getElementById('mostrar_alumnos').innerHTML = "<p>Error al cargar los alumnos.</p>";
        });
}


function presenteAusente(){

    checkPresente = document.getElementById('checkin').ariaChecked;
    
    if (checkPresente) {
        
    }

}


