<?php
session_start();

($conn = mysqli_connect('localhost', 'root', '', 'crud_db')) or
    die(mysqli_error($mysqli));

?>
