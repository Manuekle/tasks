<!-- importar la base de datos -->
<?php include 'db.php'; ?>

<?php include 'includes/header.php'; ?>

<main class="container p-4">
  <div class="row">
    <div class="col-md-4">
      <!-- Alertas con jquery de bootstrap -->
      <?php if (isset($_SESSION['message'])) { ?>
        <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
          <?= $_SESSION['message'] ?>
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
      <?php session_unset();
      } ?>
      <!-- Formulario para guardar -->
      <div class="card card-body">
        <h3>Tarea</h3>
        <hr>
        <form action="save_tarea.php" method="POST">
          <div class="form-group">
            <input type="text" name="titulo" class="form-control" placeholder="Titulo" autofocus required>
          </div>
          <div class="form-group">
            <textarea name="descripcion" rows="2" class="form-control" placeholder="Descripción" required></textarea>
          </div>
          <!-- Solo para ver las materias pero no los registra -->
          <div class="form-group">
            <select class="form-control">
              <option value="0">Seleccionar Materia</option>
              <?php
              $query = "SELECT * FROM materia";
              $result_materias = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_assoc($result_materias)) { ?>
                <option name="materia" required value="<?php echo $row['id_materia']; ?>"><?php echo $row['nombre']; ?></option>
              <?php }
              ?>
            </select>
          </div>
          <!-- solo para ver estudinates pero no los registra -->
          <div class="form-group">
            <select class="form-control">
              <option value="0">Seleccionar Estudiante</option>
              <?php
              $query = "SELECT * FROM estudiante";
              $result_estudiante = mysqli_query($conn, $query);

              while ($row = mysqli_fetch_assoc($result_estudiante)) { ?>
                <option name="estudiante" required value="<?php echo $row['id_estudiante']; ?>"><?php echo $row['primer_nombre']; ?> <?php echo $row['segundo_nombre']; ?> <?php echo $row['primer_apellido']; ?> <?php echo $row['segundo_apellido']; ?></option>
              <?php }
              ?>
            </select>
          </div>
          <input type="submit" name="save_tarea" class="btn btn-success btn-block" value="Guardar">
        </form>
      </div>
    </div>
    <!-- Tabla -->
    <div class="col-md-8">
      <table class="table table-bordered">
        <thead>
          <h3>Lista de Tareas</h3>
          <tr>
            <th>Titulo</th>
            <th>Descripción</th>
            <th>Fecha de Creación</th>
            <th>Acción</th>
          </tr>
        </thead>
        <tbody>
          <!-- Consultas a la base de datos -->
          <?php
          $query = 'SELECT * FROM tarea';
          $result_tarea = mysqli_query($conn, $query);

          while ($row = mysqli_fetch_assoc($result_tarea)) { ?>
            <tr>
              <td><?php echo $row['titulo']; ?></td>
              <td><?php echo $row['descripcion']; ?></td>
              <td><?php echo $row['created_at']; ?></td>
              <td>
                <!-- Boton de editar -->
                <a href="edit_tarea.php?id_tarea=<?php echo $row['id_tarea']; ?>" class="btn btn-secondary">
                  <i class="fas fa-pen"></i>
                </a>
                <!-- Boton de eliminar -->
                <a href="delete_tarea.php?id_tarea=<?php echo $row['id_tarea']; ?>" class="btn btn-danger">
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