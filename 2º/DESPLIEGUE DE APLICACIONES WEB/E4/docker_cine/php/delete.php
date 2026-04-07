<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_GET['id'];

$sql = "DELETE FROM peliculas WHERE id = $id";
$conn->query($sql);

$conn->close();

header("Location: index.php");
exit;