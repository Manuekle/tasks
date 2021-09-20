<?php

include 'db.php';

if (isset($_GET['id_materia'])) {
    $id_materia = $_GET['id_materia'];
    $query = "DELETE FROM materia WHERE id_materia = $id_materia";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error');
    }

    $_SESSION['message'] = 'Materia Eliminada Correctamente';
    $_SESSION['message_type'] = 'danger';
    header('Location: materia.php');
}

?>
