<?php
class PokemonView {
    private array $pokemons;
    
    public function __construct() {

    }

    public function setPokemons (array $pokemons){
        $this->pokemons = $pokemons;
    }

    public function mostrar() {
        $html= '<!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Lista de Pokemons</title>
        </head>
        <body>
            <h1>Lista de Pokemons</h1>
            <table border="1">
                <tr>
                    <th>Nombre</th>
                    <th>Tipo</th>
                    <th>Salud</th>
                    <th>Ataque</th>
                    <th>Defensa</th>
                    <th>Velocidad</th>
                    <th>Ataque especial</th>
                    <th>Defensa Especial</th>
                    <th>Descripcion</th>
                </tr>';

                foreach ($this->pokemons as $pokemon) {
                    $html .= '
                <tr>
                    <td>' . htmlspecialchars($pokemon['nombre']) . '</td>
                    <td>' . htmlspecialchars($pokemon['tipo']) . '</td>
                    <td>' . htmlspecialchars($pokemon['salud']) . '</td>
                    <td>' . htmlspecialchars($pokemon['ataque']) . '</td>
                    <td>' . htmlspecialchars($pokemon['defensa']) . '</td>
                    <td>' . htmlspecialchars($pokemon['velocidad']) . '</td>
                    <td>' . htmlspecialchars($pokemon['ataque_especial']) . '</td>
                    <td>' . htmlspecialchars($pokemon['defensa_especial']) . '</td>
                    <td>' . htmlspecialchars($pokemon['descripcion']) . '</td>
                </tr>';
                }
                $html .= '
        </table>
        </body>
        </html>';
                
                echo $html;
    }
}