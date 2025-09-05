<?php
class Lighting extends Connection {
    private $lamps = []; // Almacena los objetos Lamp
    private $currentFilter = 'all'; // Filtro actual por zona

    // Constructor
    public function __construct() {
        parent::__construct();
        if (isset($_SESSION['filter'])) {
            $this->currentFilter = $_SESSION['filter'];
        }
    }

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









    /**
 * Obtiene el resumen de lámparas encendidas, apagadas y potencia total en la zona filtrada o en todas.
 * @return array ['on' => int, 'off' => int, 'power' => int]
 */
    public function getLampStatusCountByZone() {
        if ($this->currentFilter === 'all') {
            $sql = "SELECT 
                        SUM(CASE WHEN lamp_on = 1 THEN 1 ELSE 0 END) AS on_count,
                        SUM(CASE WHEN lamp_on = 0 THEN 1 ELSE 0 END) AS off_count,
                        SUM(CASE WHEN lamp_on = 1 THEN lamp_models.model_wattage ELSE 0 END) AS power
                    FROM lamps
                    INNER JOIN lamp_models ON lamp_model = lamp_models.model_id;";
            $stmt = $this->conn->prepare($sql);
        } else {
            $sql = "SELECT 
                        SUM(CASE WHEN lamp_on = 1 THEN 1 ELSE 0 END) AS on_count,
                        SUM(CASE WHEN lamp_on = 0 THEN 1 ELSE 0 END) AS off_count,
                        SUM(CASE WHEN lamp_on = 1 THEN lamp_models.model_wattage ELSE 0 END) AS power
                    FROM lamps
                    INNER JOIN lamp_models ON lamp_model = lamp_models.model_id
                    INNER JOIN zones ON lamps.lamp_zone = zones.zone_id
                    WHERE zones.zone_name = :zoneName;";
            $stmt = $this->conn->prepare($sql);
            $stmt->bindParam(':zoneName', $this->currentFilter, PDO::PARAM_STR);
        }

        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        return [
            'on' => (int)($result['on_count'] ?? 0),
            'off' => (int)($result['off_count'] ?? 0),
            'power' => (int)($result['power'] ?? 0)
        ];
    }

}
?>
