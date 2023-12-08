<?php

use App\Controller\DogController;

$dog = new DogController;


Flight::route("GET /api/v1",[$dog,"index"]);
Flight::route('GET /api/v1/prueba', function(){
    var_dump($_ENV);
});
Flight::start();