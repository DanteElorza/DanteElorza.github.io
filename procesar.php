<?php
// Conexión a la base de datos SQLite
try {
    $db = new PDO('sqlite:basededatos.sqlite');
} catch (PDOException $e) {
    echo 'Error al conectarse a la base de datos: ' . $e->getMessage();
    die();
}

// Obtener datos del formulario
$nombre = $_POST['nombre'] ?? '';
$edad = $_POST['edad'] ?? 0;
$genero = $_POST['genero'] ?? '';
$pelicula = $_POST['pelicula'] ?? '';

// Insertar datos en la tabla usuarios
$query = "INSERT INTO usuarios (nombre, edad, genero, pelicula) VALUES (:nombre, :edad, :genero, :pelicula)";
$statement = $db->prepare($query);
$statement->bindParam(':nombre', $nombre);
$statement->bindParam(':edad', $edad);
$statement->bindParam(':genero', $genero);
$statement->bindParam(':pelicula', $pelicula);
$result = $statement->execute();

if ($result) {
    echo 'Datos guardados correctamente en la base de datos.';
} else {
    echo 'Error al guardar los datos en la base de datos.';
}

// Cerrar la conexión a la base de datos
$db = null;
?>