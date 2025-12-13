<?php
echo "<h1>Docker fonctionne 🎉</h1>";

$host = "db";
$db   = "demo";
$user = "user";
$pass = "userpass";

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db;charset=utf8", $user, $pass);
    echo "<p>Connexion à la base de données : OK ✅</p>";
} catch (Exception $e) {
    echo "<p>Erreur de connexion ❌</p>";
}
