CREATE DATABASE prueba_db;

use prueba_db;

-- crear tablas
CREATE TABLE tarea(
  id_tarea INT(11) PRIMARY KEY AUTO_INCREMENT,
  titulo VARCHAR(255) NOT NULL,
  descripcion TEXT,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  estudiante_id INT NOT NULL,
  materia_id INT NOT NULL
);


CREATE TABLE materia (
  id_materia INT(11) PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(255) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  tarea_id INT NOT NULL,
  estudiante_id INT NOT NULL
);

CREATE TABLE estudiante (
  id_estudiante INT(11) PRIMARY KEY AUTO_INCREMENT,
  primer_nombre VARCHAR(25) NOT NULL,
  segundo_nombre VARCHAR(25) DEFAULT NULL,
  primer_apellido VARCHAR(25) NOT NULL,
  segundo_apellido VARCHAR(25) DEFAULT NULL,
  identificacion INT(20) NOT NULL,
  created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
  tarea_id INT NOT NULL,
  materia_id INT NOT NULL
);

-- creacion de Fornaeas, no deja guardar datos, error de query
ALTER TABLE tarea ADD
  FOREIGN KEY fk_materia_id(materia_id)
  REFERENCES materia(id_materia);

ALTER TABLE tarea ADD
  FOREIGN KEY fk_estudiante_id(estudiante_id)
  REFERENCES estudiante(id_estudiante);
  
ALTER TABLE materia ADD
  FOREIGN KEY fk_estudiante_id(estudiante_id)
  REFERENCES estudiante(id_estudiante);

ALTER TABLE materia ADD
  FOREIGN KEY fk_tarea_id(tarea_id)
  REFERENCES tarea(id_tarea);


ALTER TABLE estudiante ADD
  FOREIGN KEY fk_materia_id(materia_id)
  REFERENCES materia(id_materia);

ALTER TABLE estudiante ADD
  FOREIGN KEY fk_tarea_id(tarea_id)
  REFERENCES tarea(id_tarea);

COMMIT;