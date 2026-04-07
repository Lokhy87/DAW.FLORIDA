<?php
$servername = "db";
$username = "usuario1";
$password = "contrasenyaUsuario1";
$dbname = "cine";

// Crear la conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar la conexión
if ($conn->connect_error) {
die("Conexión fallida: " . $conn->connect_error);
}

// Consulta SQL para seleccionar todo el contenido de la tabla peliculas
$sql = "SELECT * FROM peliculas";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Listado de Películas</title>
</head>

<body>

<h1>Listado de Películas</h1>

<form action="add.php" method="post">
    <input type="text" name="titulo" placeholder="Título" required>
    <input type="text" name="director" placeholder="Director" required>
    <input type="number" name="anyo" placeholder="Año" required>
    <input type="text" name="nota" placeholder="Nota">
    <button type="submit">Añadir película</button>
</form>

<table>
<thead>
<tr> <th>ID</th><th>Título</th><th>Director</th><th>Nota</th><th>Año</th><th>Ppto</th><th>Img</th><th>Trailer</th><th>Acciones</th>
</tr>
</thead>
<tbody>

<?php
if ($result->num_rows > 0) {
while($row = $result->fetch_assoc()) {
echo "<tr>";
echo "<td>" . htmlspecialchars($row["id"]) . "</td>";
echo "<td>" . htmlspecialchars($row["titulo"]) . "</td>";
echo "<td>" . htmlspecialchars($row["director"]) . "</td>";
echo "<td>" . htmlspecialchars($row["nota"]) . "</td>";
echo "<td>" . htmlspecialchars($row["anyo"]) . "</td>";
echo "<td>" . htmlspecialchars($row["presupuesto"]) . "</td>";
echo "<td><img src='data:image/jpeg;base64," . htmlspecialchars($row["img_base64"]) . "' alt='Imagen' width='100' height='100'></td>";
echo "<td><a href='" . htmlspecialchars($row["url_trailer"]) . "' target='_blank'>Ver Trailer</a></td>";
echo "<td><a href='delete.php?id=" . $row["id"] . "'>Borrar</a></td>";
echo "</tr>";
}
} else { echo "<tr><td colspan='8'>No hay registros</td></tr>";}
?>

</tbody>
</table>

</body>
</html>

<?php
$conn->close();
?>