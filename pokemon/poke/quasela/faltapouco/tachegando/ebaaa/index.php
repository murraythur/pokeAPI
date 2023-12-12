<?php 
    $encontrados2 = 5;
    $pokemons_api = file_get_contents("https://pokeapi.co/api/v2/pokemon");
    $pokemons = json_decode($pokemons_api, true);
    for ($i=0; $i < $encontrados2 ; $i++) { 
        $pokemon = $pokemons['results'][$i];
        $todas_infos_api = file_get_contents($pokemon['url']);
        $pokemons['results'][$i] = json_decode($todas_infos_api, true);
    }
    
    if(isset($_POST['campo_busca'])){
       
        $encontrados = [];
            foreach ($pokemons['results'] as $poke) {
                
                if(str_contains($poke['name'],$_POST['campo_busca'])){
                     $encontrados[] = $poke;
                     
                }
         
            }
        $encontrados2 = count($encontrados);
        print("realizou a busca".$poke);
    }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pokedex</title>
    <style>
        #pesquisa {
            border-style: outset;
            
            background : #A52A2A	;
            font-family : Verdana, Geneva , Tahoma, sans-serif;
            padding :20px;
            text-align : center;

        }
        .pokemon {
            padding : 15px;
            width :20%;
            border : solid #000000;
            float : left;
            text-align: center;
            margin: 1% ;
            background: #FAF0E6;
            border-style: double;
        }
        .pokemon img{
            max-width: 100%;
            height: 150px;
        }
        input[type=text] {
            width: 50%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            border-radius: 4px;
            font-size: 16px;      
            padding: 13px 20px 12px 40px;
        }
        input[type=submit] {
            width: 10%;

            border-radius: 10%;
            box-sizing: border-box;
            border: 2px solid #ccc;
            font-size: 16px;
            background-color: white;
            padding: 13px 40px 12px 40px;
            
        }
    </style>
</head>
<body>
    <div id="pesquisa"> 
        <form method="post">
                <input type="text" name='campo_busca' placeholder ="Digite o pokemon">
                <input type="submit" value="Buscar">
        </form>
    </div>
    <div id="pokemons">
        <?php
            for ($i=0; $i < $encontrados2 ; $i++): ?>
                <div class="pokemon">
                    <h1><?= $pokemons['results'][$i]['name']?></h1>
                    <img src="<?= $pokemons['results'][$i]['sprites']['other']['dream_world']['front_default']?>" alt="Pokemon Dewgong " width="200px">
                    <p>Altura <?= $pokemons['results'][$i]['height']/10?> m</p>

                    <p>Peso <?= $pokemons['results'][$i]['weight']/10?> kg</p>
    

                    </div>
            
    </div>
          <?php  endfor ?>

  
</body>
</html>
