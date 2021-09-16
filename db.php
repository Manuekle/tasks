<?php
session_start();

($conn = mysqli_connect('localhost', 'root', '', 'prueba_db')) or
    die(mysqli_error($mysqli));

?>
