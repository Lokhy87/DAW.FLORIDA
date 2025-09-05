<?php
class Lighting extends Connection {
    private $lamps = []; // Almacena los objetos Lamp (puedo eliminarlo, ahora no se usa)
    private $currentFilter = 'all'; // Filtro actual por zona

    // Constructor
    public function __construct() {
        parent::__construct();
        if (isset($_SESSION['filter'])) {
            $this->currentFilter = $_SESSION['filter'];
        }
    }
    // Recordar la zona sleeccionada entre recargas

    // Funcion getAllLamp - Obtener todas las lamparas
    private function getAllLamps() {
        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamp_on,
        lamp_models.model_part_number, lamp_models.model_wattage,
        zones.zone_name FROM lamps 
        INNER JOIN lamp_models ON lamps.lamp_model = lamp_models.model_id 
        INNER JOIN zones ON lamps.lamp_zone = zones.zone_id 
        ORDER BY lamps.lamp_id;";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lamps = [];
        foreach ($result as $row) {
            $lamp = new Lamp(
                $row['lamp_id'], 
                $row['lamp_name'], 
                $row['lamp_on'], 
                $row['model_part_number'], 
                $row['model_wattage'], 
                $row['zone_name']
            );
            $lamps[] = $lamp;
        }
        return $lamps;
    }
    // Genera un array de objetos Lamp, con una consulta SWL une las tres tabalas. Manejo datos como objetos en lugar de arrays. 

    // Funcion getFilteredLamp - Devuelva las lamparas filtradas por zonas
    private function getFilteredLamps() {
        if ($this->currentFilter === 'all') {
            return $this->getAllLamps();
        }

        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamp_on,
        lamp_models.model_part_number, lamp_models.model_wattage,
        zones.zone_name FROM lamps 
        INNER JOIN lamp_models ON lamps.lamp_model = lamp_models.model_id 
        INNER JOIN zones ON lamps.lamp_zone = zones.zone_id 
        WHERE zones.zone_name = :zone
        ORDER BY lamps.lamp_id;";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':zone', $this->currentFilter);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lamps = [];
        foreach ($result as $row) {
            $lamp = new Lamp(
                $row['lamp_id'], 
                $row['lamp_name'], 
                $row['lamp_on'], 
                $row['model_part_number'], 
                $row['model_wattage'], 
                $row['zone_name']
            );
            $lamps[] = $lamp;
        }
        return $lamps;
    }
    
    // Funcion drawLampsList - Muestra las lamparas
    public function drawLampsList() {
        $lamps = $this->getFilteredLamps();
        foreach ($lamps as $lamp) {
            $status = $lamp->getStatus() ? 'on' : 'off';
            $icon = $lamp->getStatus() ? 'bulb-icon-on.png' : 'bulb-icon-off.png';
            
            echo "<div class='element {$status}'>
                    <h4>
                    <a href='changestatus.php?id={$lamp->getId()}'>
                        <img src='img/{$icon}' alt='{$status}'></a>
                    {$lamp->getName()}</h4>
                    <h1>{$lamp->getPower()} W.</h1>
                    <h4>{$lamp->getZone()}</h4>
                  </div>";
        }
    }
    // Cada lampara se representa como un bloque HTML. Envi al scrip chagestatus.php para alternar estado

    // Funcion getPowerZone - Calcula la potencia total de las lamparas encendidas
    public function getPowerZone() {
        if ($this->currentFilter === 'all') {
            $sql = "SELECT SUM(lamp_models.model_wattage) as power 
                    FROM lamps 
                    INNER JOIN lamp_models ON lamp_model = lamp_models.model_id 
                    WHERE lamp_on = 1;";
            $stmt = $this->conn->prepare($sql);
        } else {
            $sql = "SELECT SUM(lamp_models.model_wattage) as power 
                    FROM lamps 
                    INNER JOIN lamp_models ON lamp_model = lamp_models.model_id 
                    INNER JOIN zones ON lamps.lamp_zone = zones.zone_id 
                    WHERE lamp_on = 1 AND zones.zone_name = :zone;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':zone', $this->currentFilter);
        }

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['power'] ?? 0;
    }
    // Control energetico. Suma lamparas encendida para reflejar el consumo real 

    // Degplegable para filtrar las zonas
    public function drawZonesOptions() {
        $sql = "SELECT DISTINCT zone_name FROM zones ORDER BY zone_name;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $zones = $stmt->fetchAll(PDO::FETCH_COLUMN);

        echo "<form method='POST'>";
        echo "<select name='filter'>";
        echo "<option value='all'" . ($this->currentFilter == 'all' ? ' selected' : '') . ">Todas las zonas</option>";
        foreach ($zones as $zone) {
            $selected = ($this->currentFilter == $zone) ? 'selected' : '';
            echo "<option value='{$zone}' {$selected}>{$zone}</option>";
        }
        echo "</select>";
        echo "<input type='submit' value='Filtrar por zona'>";
        echo "</form>";
    }
    // Formulario permite filtrar las lamparas por zona, interfaz manejable
}
?>
