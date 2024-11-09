CREATE DATABASE IF NOT EXISTS asistencialito;

USE asistencialito;


CREATE TABLE IF NOT EXISTS institucion (
    id_institucion INT AUTO_INCREMENT PRIMARY KEY,
    nombre_institucion VARCHAR(100) UNIQUE,
    direccion_institucion VARCHAR(255) UNIQUE,
    cue INT(10)
);


CREATE TABLE IF NOT EXISTS materias (
    id_materia INT AUTO_INCREMENT PRIMARY KEY,
    nombre_materia VARCHAR(255),
    id_institucion INT,
    FOREIGN KEY (id_institucion) REFERENCES institucion(id_institucion) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS alumnos ( 
    id_alumno INT AUTO_INCREMENT PRIMARY KEY, 
    nombre_alumno VARCHAR(50), 
    apellido_alumno VARCHAR(50), 
    fecha_nacimiento_alumno DATE, 
    dni_alumno VARCHAR(10) UNIQUE,
    id_materia INT,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS profesores (
    id_profesor INT AUTO_INCREMENT PRIMARY KEY,
    email_profesor VARCHAR(255),
    contrasena_profesor VARCHAR(255),
    nombre_profesor VARCHAR(50),
    apellido_profesor VARCHAR(50),
    fecha_nacimiento_profesor DATE,
    legajo VARCHAR(20) UNIQUE
);


CREATE TABLE IF NOT EXISTS asistencias (
    id_asistencia INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT,
    id_materia INT,
    fecha_asistencia DATE,
    presente TINYINT (1),
    FOREIGN KEY (id_alumno) REFERENCES alumnos(id_alumno) ON DELETE CASCADE,
    FOREIGN KEY (id_materia) REFERENCES materias(id_materia) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS notas (
    id_nota INT AUTO_INCREMENT PRIMARY KEY,
    id_alumno INT,
    id_materia INT,
    nota1 DECIMAL(5,2),
    nota2 DECIMAL(5,2),
    nota3 DECIMAL(5,2),
    FOREIGN KEY (id_alumno) REFERENCES alumnos (id_alumno) ON DELETE CASCADE,
    FOREIGN KEY (id_materia) REFERENCES materias (id_materia) ON DELETE CASCADE
);


CREATE TABLE IF NOT EXISTS ram (
    id_ram int NOT NULL AUTO_INCREMENT PRIMARY KEY,
    nota_libre DECIMAL(5,2),
    nota_regular DECIMAL(5,2),
    nota_promocion DECIMAL(5,2),
    porcentaje_regular DECIMAL(5,2),
    porcentaje_promocion DECIMAL(5,2)
);


INSERT INTO institucion (nombre_institucion, direccion_institucion, cue) VALUES 
('Sedes', 'santa fe', 123);

INSERT INTO materias (nombre_materia, id_institucion) VALUES
('Programacion II', 1);

INSERT INTO profesores (email_profesor, contrasena_profesor, nombre_profesor, apellido_profesor, fecha_nacimiento_profesor, legajo) VALUES
    ('javier@gmail.com', 'javier123', 'Javier', 'Parra', '2002-08-25', '1');

INSERT INTO ram (nota_libre, nota_regular, nota_promocion, porcentaje_regular, porcentaje_promocion) VALUES
    (5, 6, 7, 60, 70);

INSERT INTO alumnos (nombre_alumno, apellido_alumno, fecha_nacimiento_alumno, dni_alumno, id_materia) 
VALUES
('Valentino', 'Andrade', '1999-03-12', '35123456', 1),
('Lucas', 'Cedres', '1998-09-07', '34876543', 1),
('Facundo', 'Figun', '2000-11-25', '40123789', 1),
('Luca', 'Giordano', '1997-06-02', '32456789', 1),
('Bruno', 'Godoy', '1999-01-18', '36789123', 1),
('Agustin', 'Gomez', '1996-04-30', '33567890', 1),
('Brian', 'Gonzalez', '1997-12-05', '35678901', 1),
('Federico', 'Guigou Scottini', '1998-08-15', '37890123', 1),
('Luna', 'Marrano', '1999-03-10', '38901234', 1),
('Giuliana', 'Mercado Aviles', '1995-10-22', '33345678', 1),
('Lucila', 'Mercado Ruiz', '1996-12-08', '32567890', 1),
('Angel', 'Murillo', '1998-02-27', '34890123', 1),
('Juan', 'Nissero', '1999-07-17', '36123456', 1),
('Fausto', 'Parada', '1997-11-06', '35234567', 1),
('Ignacio', 'Piter', '1996-05-19', '32789012', 1),
('Tomas', 'Planchon', '2000-09-03', '40456789', 1),
('Elisa', 'Ronconi', '1995-01-24', '31678123', 1),
('Exequiel', 'Sanchez', '1998-04-11', '33234567', 1),
('Melina', 'Schimpf Baldo', '1996-10-09', '33789456', 1),
('Diego', 'Segovia', '1997-02-13', '34567890', 1),
('Camila', 'Sittner', '1999-08-20', '36456789', 1),
('Yamil', 'Villa', '1998-06-28', '35345678', 1);
