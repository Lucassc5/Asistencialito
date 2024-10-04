    
    var formulario = document.getElementById('formulario');
    var respuesta = document.getElementById('respuesta');

    formulario.addEventListener('submit', function(e){

        e.preventDefault();

        //console.log('click')

        var data = new FormData(formulario);

        //console.log(data.get('email'));
        //console.log(data.get('contrasena'));

        fetch('validarIndex.php', {
            method: 'POST',
            body: data
        })
        .then (res => res.json())
        .then (datos => {

            console.log(datos);

            if(datos === 'error'){

                respuesta.innerHTML = `
                <div class="alert alert-danger" role="alert">
                    Llena todos los campos
                </div>
                `
            }

        } )
    })

