<?php

include 'db.php';

// Metodo para guardar los datos de una tarea
if (isset($_POST['save_tarea'])) {
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "INSERT INTO tarea(titulo, descripcion) VALUES ('$titulo', '$descripcion')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die('Error');
    }

    $_SESSION['message'] = 'Tarea Guardada Correctamente';
    $_SESSION['message_type'] = 'success';
    header('Location: tarea.php');
}
