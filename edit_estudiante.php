<?php
include 'db.php';
$primer_nombre = '';
$segundo_nombre = '';
$primer_apellido = '';
$segundo_apellido = '';
$identificacion = '';

if (isset($_GET['id_estudiante'])) {
    $id_estudiante = $_GET['id_estudiante'];
    $query = "SELECT * FROM estudiante WHERE id_estudiante=$id_estudiante";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $primer_nombre = $row['primer_nombre'];
        $segundo_nombre = $row['segundo_nombre'];
        $primer_apellido = $row['primer_apellido'];
        $segundo_apellido = $row['segundo_apellido'];
        $identificacion = $row['identificacion'];
    }
}

if (isset($_POST['update'])) {
    $id_estudiante = $_GET['id_estudiante'];
    $primer_nombre = $_POST['primer_nombre'];
    $segundo_nombre = $_POST['segundo_nombre'];
    $primer_apellido = $_POST['primer_apellido'];
    $segundo_apellido = $_POST['segundo_apellido'];
    $identificacion = $_POST['identificacion'];

    $query = "UPDATE estudiante set primer_nombre = '$primer_nombre', segundo_nombre = '$segundo_nombre', primer_apellido = '$primer_apellido', segundo_apellido = '$segundo_apellido', identificacion = '$identificacion' WHERE id_estudiante=$id_estudiante";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Estudiante actualizado con éxito';
    $_SESSION['message_type'] = 'warning';
    header('Location: estudiante.php');
}
?>
<?php include 'includes/header.php'; ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_estudiante.php?id_estudiante=<?php echo $_GET[
          'id_estudiante'
      ]; ?>" method="POST">
        <div class="form-group">
          <input name="primer_nombre" type="text" class="form-control" required value="<?php echo $primer_nombre; ?>">
        </div><div class="form-group">
          <input name="segundo_nombre" type="text" class="form-control" required value="<?php echo $segundo_nombre; ?>">
        </div><div class="form-group">
          <input name="primer_apellido" type="text" class="form-control" required value="<?php echo $primer_apellido; ?>">
        </div><div class="form-group">
          <input name="segundo_apellido" type="text" class="form-control" required value="<?php echo $segundo_apellido; ?>">
        </div><div class="form-group">
          <input name="identificacion" type="number" class="form-control" required value="<?php echo $identificacion; ?>">
        </div>
        <button class="btn btn-success btn-block" name="update">
          Actualizar
        </button>
      </form>
      </div>
    </div>
  </div>
</div>
<?php include 'includes/footer.php'; ?>
