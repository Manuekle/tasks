<?php

include 'db.php';

if (isset($_POST['save_estudiante'])) {
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $identificacion = $_POST['identificacion'];
    $query = "INSERT INTO estudiante(primer_nombre, segundo_nombre, primer_apellido, segundo_apellido, identificacion) VALUES ('$primer_nombre', '$segundo_nombre', '$primer_apellido', '$segundo_apellido', '$identificacion')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Failed.');
    }

    $_SESSION['message'] = 'Estudiante Guardado Correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: estudiante.php');
}

?>
