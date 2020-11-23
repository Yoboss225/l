<?php
include "../Routeur.php";

session_name("test_Epitech");
session_start();


$router = new Routeur();
$router->run();