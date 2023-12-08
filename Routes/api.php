<?php

use App\Controller\DogController;

$dog = new DogController;
$uri = $_ENV['API_URI'];

Flight::route("GET {$uri}",[$dog,"index"]);
Flight::start();