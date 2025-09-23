<?php
class MySQLConexion {
    public function conectar() {
        echo "Conectando a la base de datos MySQL...\n";
    }
}

class UsuarioService {
    private $conexion;

    public function __construct(MySQLConexion $conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerUsuarios() {
        $this->conexion->conectar();
        echo "Obteniendo lista de usuarios de MySQL...\n";
    }
}

// UsuarioService depende directamente de MySQLConexion
$mysql = new MySQLConexion();
$servicio = new UsuarioService($mysql);
$servicio->obtenerUsuarios();
?>

// con SOLID

<?php
// 1. Definimos una interfaz (abstracción) para la conexión
interface Conexion {
    public function conectar();
}

// 2. Implementamos la interfaz en MySQLConexion
class MySQLConexion implements Conexion {
    public function conectar() {
        echo "Conectando a la base de datos MySQL...\n";
    }
}

// 3. Podemos crear otras implementaciones de la misma interfaz (PostgreSQL, por ejemplo)
class PostgreSQLConexion implements Conexion {
    public function conectar() {
        echo "Conectando a la base de datos PostgreSQL...\n";
    }
}

// 4. UsuarioService ahora depende de una abstracción (la interfaz Conexion), no de una implementación concreta
class UsuarioService {
    private $conexion;

    // Recibe cualquier implementación de la interfaz Conexion
    public function __construct(Conexion $conexion) {
        $this->conexion = $conexion;
    }

    public function obtenerUsuarios() {
        $this->conexion->conectar();
        echo "Obteniendo lista de usuarios...\n";
    }
}

// Ahora podemos cambiar la base de datos sin modificar UsuarioService

// Usando MySQL
$mysql = new MySQLConexion();
$servicioMySQL = new UsuarioService($mysql);
$servicioMySQL->obtenerUsuarios();

// Usando PostgreSQL
$pgsql = new PostgreSQLConexion();
$servicioPostgreSQL = new UsuarioService($pgsql);
$servicioPostgreSQL->obtenerUsuarios();
?>

