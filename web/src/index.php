<?php
echo "<h1>Déploiement Docker – Stack Web + DB</h1>";

try {
    $pdo = new PDO(
        "mysql:host=db;dbname=" . getenv("MYSQL_DATABASE") . ";charset=utf8",
        getenv("MYSQL_USER"),
        getenv("MYSQL_PASSWORD"),
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    echo "<p style='color:green;'>Connexion à MySQL : OK ✅</p>";

    $stmt = $pdo->query("SELECT message FROM demo");
    $row = $stmt->fetch();

    echo "<p>Message depuis la base : <strong>{$row['message']}</strong></p>";

} catch (PDOException $e) {
    echo "<p style='color:red;'>Erreur DB ❌</p>";
    echo "<pre>{$e->getMessage()}</pre>";
}
?>

<script src="script.js"></script>
