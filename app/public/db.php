<?php

$server = 'db';
$username = 'root';
$password = 'example';
$database = 'u04_todo_app';

try {
    $conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
} catch (PDOException $e) {
    die('Conexion failed: ' . $e->getMessage());
}
