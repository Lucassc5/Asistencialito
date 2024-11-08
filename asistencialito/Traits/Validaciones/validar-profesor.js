function validarFormulario() {
    email = document.getElementById("email").value;
    contrasena = document.getElementById("contrasena").value;
    nombre = document.getElementById("nombre").value;
    apellido = document.getElementById("apellido").value;
    fecha_nacimiento = document.getElementById("fecha_nacimiento").value;
    legajo = document.getElementById("legajo").value;

        if (email === "" || contrasena === "" || nombre ==="" || apellido ==="" || fecha_nacimiento ==="" || legajo ==="") {
            alert("Debes completar todos los campos");
            return false; 
        }
        return true;
}