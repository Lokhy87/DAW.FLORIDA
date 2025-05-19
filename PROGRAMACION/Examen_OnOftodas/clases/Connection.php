<?php
class Connection {
    private $host;
    private $dbname;
    private $user;
    private $pass;
    protected $conn;
    private $configFile = "conf.json";

    // Constructor
    public function __construct() {
        $this->loadConfig();
        $this->conn = $this->connect();
    }
    // Carglo los datos de configuracion desde un archivo externo y establezco conexion.

    // Carga de datos desde Json
    private function loadConfig() {
        if (!file_exists($this->configFile)) {
            die("Archivo de configuración no encontrado.");
        }

        $config = json_decode(file_get_contents($this->configFile), true);
        if (!$config) {
            die("Error al leer el archivo de configuración.");
        }

        // Asignar valores a propiedades
        $this->host = $config['host'];
        $this->user = $config['user'];
        $this->pass = $config['pass'];
        $this->dbname = $config['dbname'];
    }

    // Establecer la conexcion PDO con las base de datos
    public function connect() {
        if ($this->conn === null) {
            try {
                $dsn = "mysql:host={$this->host};dbname={$this->dbname};charset=utf8mb4";
                $this->conn = new PDO($dsn, $this->user, $this->pass);
                $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                die("Error de conexión: " . $e->getMessage());
            }
        }
        return $this->conn;
    }
    // Devuelve la conexion PDO, asegura que solo se cree una vez. Captura erroresde conexion con try/catch
}