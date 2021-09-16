<?php include 'db.php'; ?>

<?php include 'includes/header.php'; ?>

<main class="container p-4">
  <div class="row">
  <div class="jumbotron">
  <h1 class="display-4">Universidad del Cauca</h1>
  <p class="lead">Aquí hemos realizado una aplicación CRUD muy simple con PHP y HTML.</p>
  <hr class="my-4">
  <div class="row">
    <div class="col-md-4"><a class="btn btn-primary btn-lg" href="tarea.php" role="button">Tareas</a></div>
    <div class="col-md-4"><a class="btn btn-primary btn-lg" href="materia.php" role="button">Materias</a></div>
    <div class="col-md-4"><a class="btn btn-primary btn-lg" href="estudiante.php" role="button">Estudiantes</a></div>
  </div>
</div>
  </div>
</main>

<?php include 'includes/footer.php'; ?>
