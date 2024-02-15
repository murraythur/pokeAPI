<?php



$short = "p";

$long = [
    "pokemon:"
];

$options = getopt($short, $long);

$nome = $options['pokemon'];


  $nome = readline("informe o seu pokemon --> ");

    $dados_em_texto = file_get_contents("https://pokeapi.co/api/v2/pokemon/{$nome}");

    $pokemon = json_decode($dados_em_texto, true);

    print (strtoupper($pokemon['name']) . "\n");
    print " " . "\n";
    print ("altura: " . $pokemon['height'] . "\n");
    print ("peso: " . $pokemon['weight'] . "\n");

    foreach ($pokemon['moves'] as $move) {
        print ("movimentos: " . $move['move']['name']. "\n");

    }
    print ("movimentos: " . $pokemon['moves'][0]['move']['name']. "\n");
