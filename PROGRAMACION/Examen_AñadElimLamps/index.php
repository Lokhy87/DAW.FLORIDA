<?php
session_start();

require_once 'autoload.php';

// Guarda el filtro recibido
if (isset($_POST['filter'])) {
    $_SESSION['filter'] = $_POST['filter'];
}

if (isset($_GET['delete'])) {
    $lampId = intval($_GET['delete']);
    $lighting = new Lighting();
    $lighting->deleteLamp($lampId);
    
    // Redirigir para evitar recarga duplicada
    header("Location: index.php");
    exit;
}

// Procesar formulario de añadir lámpara
if (isset($_POST['lamp_name'], $_POST['lamp_model'], $_POST['lamp_zone'], $_POST['lamp_on'])) {
    $lighting = new Lighting();
    $name = $_POST['lamp_name'];
    $modelId = intval($_POST['lamp_model']);
    $zoneId = intval($_POST['lamp_zone']);
    $status = intval($_POST['lamp_on']);

    $lighting->addLamp($name, $modelId, $zoneId, $status);

    // Redirigir para evitar reenvío doble del formulario
    header("Location: index.php");
    exit;
}




// Nuevo objeto de la clase
$lighting = new Lighting();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            background-color: lightcyan;
        }

        .center {
            margin: auto;
            width: 60%;
            padding: 10px;
            background-color: lightgreen;
        }

        .element {
            display: inline-block;
            width: 100px;
            height: 120px;
            font-size: .6em;
            text-align: center;
            margin: 10px;
        }

        .element,
        .center {
            -moz-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            -webkit-box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            box-shadow: 3px 3px 5px 6px rgb(87, 137, 87);
            border-radius: 10px;
            /*supported by all latest Browser*/
            -moz-border-radius: 10px;
            /*For older Browser*/
            -webkit-border-radius: 10px;
            /*For older Browser*/
            border: 3px solid navy;
        }

        .element img {
            width: 3em;
            vertical-align: middle;
        }

        .on {
            background-color: lightyellow;
        }

        .off {
            background-color: lightslategray;
        }

        h1 {
            font-size: 1.5em;
            text-align: center;
            background-color: black;
            color: azure;
        }

        form {
            text-align: center;
        }
    </style>
</head>

<body>
<div class="center">
    <h1>BIG STADIUM - LIGHTING CONTROL PANEL</h1>

    <!-- Mostrar el formulario de zonas -->
    <?php $lighting->drawZonesOptions(); ?><br>

    <!-- Mostrar potencia total -->
    <div class="power-display">
        Potencia total encendida: <?php echo $lighting->getPowerZone(); ?> 
    </div>
    
    <!-- Mostrar el listado de lamparas -->
    <?php $lighting->drawLampsList(); ?>

    <!-- Formulari para añadir Lamparas -->
    <hr>
    <h3>Añadir nueva lámpara</h3>
    <form method="POST">
        <label>Nombre:
            <input type="text" name="lamp_name" required>
        </label><br>

        <label>Modelo:
            <select name="lamp_model" required>
                <?php
                foreach ($lighting->getAllModels() as $model) {
                    echo "<option value='{$model['model_id']}'>{$model['model_part_number']}</option>";
                }
                ?>
            </select>
        </label><br>

        <label>Zona:
            <select name="lamp_zone" required>
                <?php
                foreach ($lighting->getAllZones() as $zone) {
                    echo "<option value='{$zone['zone_id']}'>{$zone['zone_name']}</option>";
                }
                ?>
            </select>
        </label><br>

        <label>Estado:
            <select name="lamp_on">
                <option value="1">Encendida</option>
                <option value="0">Apagada</option>
            </select>
        </label><br><br>

        <input type="submit" value="Añadir lámpara">
    </form>



</div>
</body>

</html>
