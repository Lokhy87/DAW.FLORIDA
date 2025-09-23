<?php
class Usuario {
    private $nombre;
    private $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerEmail() {
        return $this->email;
    }

    // Esta función guarda el usuario en la base de datos
    public function guardar() {
        // Lógica de conexión y guardado en la base de datos
        echo "Guardando usuario en la base de datos...\n";
    }
}

$usuario = new Usuario("Juan", "juan@example.com");
$usuario->guardar();
?>

// SOLID Bien

<?php
// Clase Usuario que se encarga solo de la lógica del usuario
class Usuario {
    private $nombre;
    private $email;

    public function __construct($nombre, $email) {
        $this->nombre = $nombre;
        $this->email = $email;
    }

    public function obtenerNombre() {
        return $this->nombre;
    }

    public function obtenerEmail() {
        return $this->email;
    }
}

// Clase UsuarioRepository que se encarga de la persistencia
class UsuarioRepository {
    public function guardar(Usuario $usuario) {
        // Lógica de conexión y guardado en la base de datos
        echo "Guardando al usuario: {$usuario->obtenerNombre()} en la base de datos...\n";
    }
}

// Ejemplo de uso
$usuario = new Usuario("Juan", "juan@example.com");
$repositorio = new UsuarioRepository();
$repositorio->guardar($usuario);
?>