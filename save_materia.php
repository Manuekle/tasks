<?php

include 'db.php';

if (isset($_POST['save_materia'])) {
    $nombre = $_POST['nombre'];
    $query = "INSERT INTO materia(nombre) VALUES ('$nombre')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Failed.');
    }

    $_SESSION['message'] = 'Materia Guardada Correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: materia.php');
}

?>
