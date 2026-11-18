<?php
$host = 'localhost';
$db   = 'webshop_db';
$user = 'root';
$pass = ''; // XAMPP-ban alapértelmezetten üres
$charset = 'utf8mb4';

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";
$options = [
    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_EMULATE_PREPARES   => false,
];

try {
    $pdo = new PDO($dsn, $user, $pass, $options);
} catch (PDOException $e) {
    die('Adatbázis-kapcsolódási hiba: ' . $e->getMessage());
}