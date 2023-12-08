<?php
require "vendor/autoload.php";
require "Routes/api.php";
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();