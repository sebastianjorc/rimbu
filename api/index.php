<?php
/* Otorgo permiso CORS */
header('Access-Control-Allow-Origin: *');
header("Access-Control-Allow-Headers: Origin, X-Requested-With, Content-Type, Accept");
header("Access-Control-Allow-Methods: GET, POST, PUT, DELEDE");
header("content-type: application/json; charset=utf-8");

require_once "controllers/route.controller.php";
require_once "controllers/get.controller.php";
require_once "models/get.model.php";
$index = new RoutesController();
$index->index();
?>