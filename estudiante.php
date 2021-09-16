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
        <h3>Estudiantes</h3>
        <hr>
        <form action="save_estudiante.php" method="POST">
          <div class="form-group">
            <input type="text" name="primer_nombre" class="form-control" placeholder="Primer Nombre" autofocus required>
          </div><div class="form-group">
            <input type="text" name="segundo_nombre" class="form-control" placeholder="Segundo Nombre" autofocus required>
          </div><div class="form-group">
            <input type="text" name="primer_apellido" class="form-control" placeholder="Primer Apellido" autofocus required>
          </div><div class="form-group">
            <input type="text" name="segundo_apellido" class="form-control" placeholder="Segundo Apellido" autofocus required>
          </div><div class="form-group">
            <input type="number" name="identificacion" class="form-control" placeholder="Identificación" autofocus required>
          </div>
          <input type="submit" name="save_estudiante" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <h3>Lista de Estudiantes</h3>
          <tr>
            <th>Nombre Completo</th>
            <th>Identificación</th>
            <th>Fecha de Creación</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>

          <?php
          $query = 'SELECT * FROM estudiante';
          $result_estudiante = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result_estudiante)) { ?>
          <tr>
            <td><?php echo $row['primer_nombre']; ?> <?php echo $row['segundo_nombre']; ?> <?php echo $row['primer_apellido']; ?> <?php echo $row['segundo_apellido']; ?></td>
            <td><?php echo $row['identificacion']; ?></td>
            <td><?php echo $row['created_at']; ?></td>
            <td>
              <a href="edit_estudiante.php?id_estudiante=<?php echo $row[
                  'id_estudiante'
              ]; ?>" class="btn btn-secondary">
                <i class="fas fa-pen"></i>
              </a>
              <a href="delete_estudiante.php?id_estudiante=<?php echo $row[
                  'id_estudiante'
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
