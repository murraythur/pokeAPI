<?php

    $pokemonUsuario = readline("insira a seguir o nome que deseja procurar --> ");
    $dadosTexto = file_get_contents("https://pokeapi.co/api/v2/pokemon/$pokemonUsuario");
    $nomesPokemonsURL = file_get_contents("https://pokeapi.co/api/v2/pokemon?limit=100000&offset=0");
    $pokemon = json_decode($dadosTexto, true);
    $nomesPokemons = json_decode($nomesPokemonsURL, true);
    $nomesPokemonsArray = [];
    
    for ($i = 0; $i < 1292; $i++) { 
        $nomesPokemonsArray[] = $nomesPokemons['results'][$i]['name'];
    }

    if(in_array($pokemonUsuario, $nomesPokemonsArray)) {
        print(strtoupper($pokemon['name']). "\n");
        print("numero: ");
        print("altura: " . $pokemon['height']/10 . "m \n");
        print("peso: " . $pokemon['weight']/10 . "kg \n");
        print("movimentos: ");

        foreach ($pokemon['moves'] as $move) {
            print(" - " . $move['move']['name']. "\n");
        }     
    }else {
        print "o pokemon precisa ser válido.";
    }
    
