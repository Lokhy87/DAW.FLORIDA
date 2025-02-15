<?php
class Factura {
    protected $numeroFactura;
    protected $cliente;
    protected $monto;

    function __construct($numeroFactura, $cliente, $monto){
        $this->setNumeroFactura($numeroFactura);
        $this->setCliente($cliente); 
        $this->setMonto($monto);
    }

    // Getters
    public function getNumeroFactura(){
        return $this->numeroFactura;
    }

    public function getCliente(){
        return $this->cliente;
    }

    public function getMonto(){
        return $this->monto;
    }

    // Getters
    public function setNumeroFactura($numeroFactura){
        $this->numeroFactura = $numeroFactura;
    }

    public function setCliente($cliente){
        $this->cliente = $cliente;
    }

    public function setMonto($monto){
        $this->monto = $monto;
    }

    function mostrarDetalles(){
        return "El cliente {$this->getCliente()} con numero {$this->getNumeroFactura()} tiene un monto total de {$this->getMonto()}.<br>";
    }
}