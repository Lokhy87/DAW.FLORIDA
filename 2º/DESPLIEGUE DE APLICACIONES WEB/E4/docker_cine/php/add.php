<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";

$conn = new mysqli($servername, $username, $password, $dbname, 3306);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$titulo = $_POST['titulo'];
$director = $_POST['director'];
$anyo = $_POST['anyo'];
$nota = $_POST['nota'];

$sql = "INSERT INTO peliculas (titulo, director, anyo, nota, presupuesto, img_base64, url_trailer)
        VALUES ('$titulo', '$director', $anyo, '$nota', 0, '', '')";

$conn->query($sql);

$conn->close();

// Volver al listado
header("Location: index.php");
exit;