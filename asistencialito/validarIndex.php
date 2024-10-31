<?php

$email = $_POST['email'];
$contrasena = $_POST['contrasena'];

if($email === '' || $contrasena === ''){

    echo json_encode('error');
}else {
    echo json_encode('Correcto' . $email . ' ' . $contrasena );
}
