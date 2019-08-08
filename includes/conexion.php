<?php

$host = "localhost";
$user = "root";
$password = "";
$database = "blog";
$db = mysqli_connect($host, $user, $password, $database);

// setiar caracteres
mysqli_query($db, "SET NAMES 'utf8'");

//iniciar la sesión
session_start();
