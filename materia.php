<?php include 'db.php'; ?>

<?php include 'includes/header.php'; ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">


      <?php if (isset($_SESSION['message'])) { ?>
      <div class="alert alert-<?= $_SESSION[
          'message_type'
      ] ?> alert-dismissible fade show" role="alert">
        <?= $_SESSION['message'] ?>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <?php session_unset();} ?>

      <div class="card card-body">
        <h3>Materia</h3>
        <hr>
        <form action="save_materia.php" method="POST">
          <div class="form-group">
            <input type="text" name="nombre" class="form-control" placeholder="Nombre" autofocus required>
          </div>
          <input type="submit" name="save_materia" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
        <h3>Lista de Materias</h3>
          <tr>
            <th>Nombre</th>
            <th>Fecha de Creación</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = 'SELECT * FROM materia';
          $result_materia = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result_materia)) { ?>
          <tr>
            <td><?php echo $row['nombre']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_materia.php?id_materia=<?php echo $row[
                  'id_materia'
              ]; ?>" class="btn btn-secondary">
                <i class="fas fa-pen"></i>
              </a>
              <a href="delete_materia.php?id_materia=<?php echo $row[
                  'id_materia'
              ]; ?>" class="btn btn-danger">
                <i class="far fa-trash-alt"></i>
              </a>
            </td>
          </tr>
          <?php }
          ?>
        </tbody>
      </table>
    </div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
