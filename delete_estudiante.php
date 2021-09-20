<?php

include 'db.php';

if (isset($_GET['id_estudiante'])) {
    $id_estudiante = $_GET['id_estudiante'];
    $query = "DELETE FROM estudiante WHERE id_estudiante = $id_estudiante";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error');
    }

    $_SESSION['message'] = 'Estudiante Eliminado Correctamente';
    $_SESSION['message_type'] = 'danger';
    header('Location: estudiante.php');
}

?>
