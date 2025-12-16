<h1>Déploiement Docker – Stack Web + DB</h1>

<h2>Ajouter un message</h2>

<form method="POST">
    <input type="text" name="message" placeholder="Votre message" required>
    <button type="submit">Envoyer</button>
</form>

<hr>

<?php
try {
    // Connexion à la base MySQL
    $pdo = new PDO(
        "mysql:host=db;dbname=" . getenv("MYSQL_DATABASE") . ";charset=utf8",
        getenv("MYSQL_USER"),
        getenv("MYSQL_PASSWORD"),
        [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION]
    );

    echo "<p style='color:green;'>Connexion à MySQL : OK ✅</p>";

    // 👉 Si un message a été envoyé via le formulaire
    if (!empty($_POST['message'])) {
        $stmt = $pdo->prepare("INSERT INTO demo (message) VALUES (:message)");
        $stmt->execute([
            'message' => $_POST['message']
        ]);
    }

    // Récupération de tous les messages
    $stmt = $pdo->query("SELECT message FROM demo ORDER BY id DESC");
    $messages = $stmt->fetchAll();

    echo "<h2>Messages enregistrés</h2>";

    foreach ($messages as $row) {
        echo "<p>• {$row['message']}</p>";
    }

} catch (PDOException $e) {
    echo "<p style='color:red;'>Erreur DB ❌</p>";
    echo "<pre>{$e->getMessage()}</pre>";
}
?>

<script src="script.js"></script>
