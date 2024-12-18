<?php
session_start();
$nom_utilisateur = $_SESSION['nom_utilisateur'] ?? 'Anonyme';

$pdo = new PDO("mysql:host=localhost;dbname=messagerie", "root", "");
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $receiver = $_POST['receiver'];
    $message = $_POST['message'];

    $stmt = $pdo->prepare("INSERT INTO messages (sender, receiver, message) VALUES (?, ?, ?)");
    $stmt->execute([$nom_utilisateur, $receiver, $message]);
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Envoyer un message</title>
</head>
<body>
    <h2>Envoyer un message</h2>
    <form method="POST">
        <label>Destinataire :</label>
        <input type="text" name="receiver" required><br><br>
        <label>Message :</label>
        <textarea name="message" rows="5" required></textarea><br><br>
        <button type="submit">Envoyer</button>
    </form>
    <a href="page_accueil.php">Retour à l'accueil</a>
</body>
</html>
