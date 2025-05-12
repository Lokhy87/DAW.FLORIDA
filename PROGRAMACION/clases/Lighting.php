<?php
class Lighting extends Connection {
    private $lamps = [];

    public function __construct() {
        parent::__construct();
        $this->getAllLamps();
    }

    private function getAllLamps() {
        $sql = "SELECT lamps.lamp_id, lamps.lamp_name, lamp_on,
        lamp_models.model_part_number,lamp_models.model_wattage,
        zones.zone_name FROM lamps INNER JOIN lamp_models ON
        lamps.lamp_model=lamp_models.model_id INNER JOIN zones ON
        lamps.lamp_zone = zones.zone_id ORDER BY lamps.lamp_id;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);

        $lamps = [];
        foreach ($result as $row) {
            $lamp = new Lamp($row['lamp_id'], $row['lamp_name'], $row['lamp_on'], $row['model_part_number'], $row['model_wattage'], $row['zone_name']);
            $lamps[] = $lamp;
        }
        return $lamps;
    }

    public function drawLampsList() {
        $lamps = $this->getAllLamps();
        foreach ($lamps as $lamp) {
            $status = $lamp->getStatus() ? 'Encendida' : 'Apagada';
            $icon = $lamp->getStatus() ? 'bulb-icon-on.png' : 'bulb-icon-off.png';
            
            echo "<tr>
                    <td>{$lamp->getId()}</td>
                    <td>{$lamp->getName()}</td>
                    <td><img src='img/{$icon}' alt='{$status}'></td>
                    <td>{$lamp->getModel()}</td>
                    <td>{$lamp->getPower()}</td>
                    <td>{$lamp->getZone()}</td>
                  </tr>";
        }
    }

    public function getPowerZone() {
        $sql = "SELECT SUM(lamp_models.model_wattage) as power FROM
        `lamps` INNER JOIN lamp_models on
        lamp_model=lamp_models.model_id WHERE lamp_on = 1 ;";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result['power'] ?? 0;
    }

}