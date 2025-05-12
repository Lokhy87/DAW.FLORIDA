<?php
class Lamp {
    private $id;
    private $name;
    private $status;
    private $model;
    private $power;
    private $zone;

    // Constructor de la clase Lamp
    public function __construct($id, $name, $status, $model, $power, $zone) {
        $this->id = $id;
        $this->name = $name;
        $this->status = $status;
        $this->model = $model;
        $this->power = $power;
        $this->zone = $zone;
    }

    // Getters 
    public function getId() {
        return $this->id;
    }
    public function getName() {
        return $this->name;
    }
    public function getStatus() {
        return $this->status;
    }
    public function getModel() {
        return $this->model;
    }
    public function getPower() {
        return $this->power;
    }
    public function getZone() {
        return $this->zone;
    }
    
    // Setters
    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setStatus($status) {
        $this->status = $status;
    }
    public function setModele($model) {
        $this->model = $model;
    }
    public function setPower($power) {
        $this->power = $power;
    }
    public function setZone($zone) {
        $this->zone = $zone;
    }
}