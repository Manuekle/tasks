<?php

include 'db.php';

if (isset($_GET['id_tarea'])) {
    $id_tarea = $_GET['id_tarea'];
    $query = "DELETE FROM tarea WHERE id_tarea = $id_tarea";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Query Failed.');
    }

    $_SESSION['message'] = 'Tarea Eliminada Correctamente';
    $_SESSION['message_type'] = 'danger';
    header('Location: tarea.php');
}

?>
