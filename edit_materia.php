<?php
include 'db.php';
$nombre = '';

if (isset($_GET['id_materia'])) {
    $id_materia = $_GET['id_materia'];
    $query = "SELECT * FROM materia WHERE id_materia=$id_materia";
    $result = mysqli_query($conn, $query);
    if (mysqli_num_rows($result) == 1) {
        $row = mysqli_fetch_array($result);
        $nombre = $row['nombre'];
    }
}

if (isset($_POST['update'])) {
    $id_materia = $_GET['id_materia'];
    $nombre = $_POST['nombre'];

    $query = "UPDATE materia set nombre = '$nombre' WHERE id_materia=$id_materia";
    mysqli_query($conn, $query);
    $_SESSION['message'] = 'Materia actualizada con éxito';
    $_SESSION['message_type'] = 'warning';
    header('Location: materia.php');
}
?>
<?php include 'includes/header.php'; ?>
<div class="container p-4">
  <div class="row">
    <div class="col-md-4 mx-auto">
      <div class="card card-body">
      <form action="edit_materia.php?id_materia=<?php echo $_GET[
          'id_materia'
      ]; ?>" method="POST">
        <div class="form-group">
          <input name="nombre" type="text" class="form-control" required value="<?php echo $nombre; ?>">
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
