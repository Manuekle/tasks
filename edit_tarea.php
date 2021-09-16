<?php
include 'db.php';
$titulo = '';
$descripcion = '';

if (isset($_GET['id_tarea'])) {
    $id_tarea = $_GET['id_tarea'];
    $query = "SELECT * FROM tarea WHERE id_tarea=$id_tarea";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $titulo = $row['titulo'];
        $descripcion = $row['descripcion'];
    }
}

if (isset($_POST['update'])) {
    $id_tarea = $_GET['id_tarea'];
    $titulo = $_POST['titulo'];
    $descripcion = $_POST['descripcion'];

    $query = "UPDATE tarea set titulo = '$titulo', descripcion = '$descripcion' WHERE id_tarea=$id_tarea";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Tarea actualizada con éxito';
    $_SESSION['message_type'] = 'warning';
    header('Location: tarea.php');
}
?>
<?php include 'includes/header.php'; ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_tarea.php?id_tarea=<?php echo $_GET[
          'id_tarea'
      ]; ?>" method="POST">
        <div class="form-group">
          <input name="titulo" type="text" class="form-control" required value="<?php echo $titulo; ?>">
        </div>
        <div class="form-group">
        <textarea name="descripcion" class="form-control" cols="30" required rows="10"><?php echo $descripcion; ?></textarea>
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
