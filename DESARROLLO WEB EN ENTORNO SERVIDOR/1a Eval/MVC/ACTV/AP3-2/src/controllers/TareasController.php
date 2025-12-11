<?php
// Incluye el modelo y la vista 
require_once __DIR__ . '/../models/Model.php';
require_once __DIR__ . '/../views/View.php';

class PokemonControler {
    public function mostrarPokemon() {
        $pokemon = new Pokemon();
        
        $pokemon = $pokemon->obtenerTodos();

        $vista = new PokemonView();
        $vista->setPokemons($pokemon);
        $vista->mostrar();
    }
}