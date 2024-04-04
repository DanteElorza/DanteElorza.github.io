<?php
// Recibir datos del formulario
$nombre = $_POST['nombre'];
$edad = $_POST['edad'];
$genero = $_POST['genero'];
$pelicula = $_POST['pelicula'];

// Abrir la conexión a la base de datos SQLite
$db = new SQLite3('datos.db');

// Crear tabla si no existe
$db->exec('CREATE TABLE IF NOT EXISTS usuarios (id INTEGER PRIMARY KEY AUTOINCREMENT, nombre TEXT, edad INTEGER, genero TEXT, pelicula TEXT)');

// Insertar datos en la tabla
$stmt = $db->prepare('INSERT INTO usuarios (nombre, edad, genero, pelicula) VALUES (:nombre, :edad, :genero, :pelicula)');
$stmt->bindValue(':nombre', $nombre, SQLITE3_TEXT);
$stmt->bindValue(':edad', $edad, SQLITE3_INTEGER);
$stmt->bindValue(':genero', $genero, SQLITE3_TEXT);
$stmt->bindValue(':pelicula', $pelicula, SQLITE3_TEXT);
$stmt->execute();

// Cerrar la conexión
$db->close();

// Redireccionar a la página de éxito
header('Location: exito.html');
?>
