<?php 
class Pokemon {
    private array $pokemons;

    public function __construct() {
        $this->pokemons = [
            [
                'nombre' => 'Mewtwo',
                'tipo' => 'Psiquico',
                'salud' => 106,
                'ataque' => 110,
                'defensa' => 90,
                'velocidad' => 130,
                'ataque_especial' => 154,
                'defensa_especial' => 90,
                'descripcion' => 'Fue creado artificialmente y es uno de los Pokémon más poderosos. Su poder psíquico es capaz de acabar con cualquier rival.'
            ],
            [
                'nombre' => 'Zekrom',
                'tipo' => 'Dragon/Electrico',
                'salud' => 100,
                'ataque' => 150,
                'defensa' => 120,
                'velocidad' => 90,
                'ataque_especial' => 120,
                'defensa_especial' => 100,
                'descripcion' => 'Representa el ideal y genera energía con su cola. Es un Pokémon legendario que lucha por crear un mundo mejor.'

            ],
            [
                'nombre' => 'Arceus',
                'tipo' => 'Normal',
                'salud' => 120,
                'ataque' => 120,
                'defensa' => 120,
                'velocidad' => 120,
                'ataque_especial' => 120,
                'defensa_especial' => 120,
                'descripcion' => 'Conocido como el Pokémon Original, se cree que creó el universo Pokémon. Se dice que posee 1,000 tipos de poder.'

            ],
            [
                'nombre' => 'Giratina',
                'tipo' => 'Fantasma/Dragon',
                'salud' => 150,
                'ataque' => 100,
                'defensa' => 120,
                'velocidad' => 90,
                'ataque_especial' => 100,
                'defensa_especial' => 120,
                'descripcion' => 'Habita en el Mundo Distorsión, una dimensión paralela. Fue desterrado por su naturaleza violenta y agresiva.'

            ],
            [
                'nombre' => 'Lugia',
                'tipo' => 'Psiquico/Volador',
                'salud' => 106,
                'ataque' => 90,
                'defensa' => 130,
                'velocidad' => 110,
                'ataque_especial' => 90,
                'defensa_especial' => 154,
                'descripcion' => 'Guardián de los mares, su poder es tan grande que debe vivir aislado. Si bate sus alas, puede generar tormentas devastadoras.'
            ]
        ];

    }

    public function obtenerTodos() {
        return $this->pokemons;
    }
}