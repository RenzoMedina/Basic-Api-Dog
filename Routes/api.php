<?php

use App\Controller\DogController;

$dog = new DogController;
$uri = $_ENV['API_URI'];

Flight::route("GET {$uri}",[$dog,"index"]);
Flight::route("GET {$uri}/@id",[$dog,"show"]);
Flight::route("POST {$uri}",[$dog,"store"]);
Flight::route("PUT {$uri}/@id",[$dog,"update"]);
Flight::route("DELETE {$uri}/@id",[$dog,"destroy"]);

Flight::start();