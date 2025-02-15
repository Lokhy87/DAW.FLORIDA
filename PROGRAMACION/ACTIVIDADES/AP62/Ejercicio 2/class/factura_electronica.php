<?php

require_once("factura.php");

class Factura_electronica extends Factura {
    protected $emailCliente;

    public function __construct($numeroFactura, $cliente, $monto, $email) {
        parent::__construct($numeroFactura, $cliente, $monto);
        $this->emailCliente = $email;
    }

    public function getEmailCliente() {
        return $this->emailCliente;
    }

    public function setEmailCliente($emailCliente) {
        $this->emailCliente = $emailCliente;
    }

    public function enviarEmail() {
        return "Factura electrónica enviada a {$this->getEmailCliente()} con número {$this->getNumeroFactura()} y monto de {$this->getMonto()}.\n";
    }
    
}