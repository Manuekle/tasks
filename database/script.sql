CREATE DATABASE prueba_db;

use prueba_db;

-- crear tablas
CREATE TABLE tarea(
  id_tarea INT(11) PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  estudiante_id INT(11),
  materia_id INT(11)
);

CREATE TABLE materia (
  id_materia INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE estudiante (
  id_estudiante INT(11) PRIMARY KEY AUTO_INCREMENT,
  primer_nombre VARCHAR(25) NOT NULL,
  segundo_nombre VARCHAR(25) DEFAULT NULL,
  primer_apellido VARCHAR(25) NOT NULL,
  segundo_apellido VARCHAR(25) DEFAULT NULL,
  identificacion INT(20) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE matricula (
  id_matricula INT(11) PRIMARY KEY AUTO_INCREMENT,
  nota INT(20) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  estudiante_id INT(11),
  materia_id INT(11)
);

-- creacion de Fornaeas
ALTER TABLE tarea ADD
  FOREIGN KEY(materia_id)
  REFERENCES materia(id_materia)
  ON DELETE CASCADE,

ALTER TABLE tarea ADD
  FOREIGN KEY(estudiante_id)
  REFERENCES estudiante(id_estudiante)
  ON DELETE CASCADE
-- -------------------------------------
ALTER TABLE matricula ADD
  FOREIGN KEY(materia_id)
  REFERENCES materia(id_materia)
  ON DELETE CASCADE,

ALTER TABLE matricula ADD
  FOREIGN KEY(estudiante_id)
  REFERENCES estudiante(id_estudiante)
  ON DELETE CASCADE

COMMIT;