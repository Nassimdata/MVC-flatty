
<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_inscription.css">
    <title>Inscription</title>
</head>
<body>
    <div class="form-container">
        <h2>Inscription</h2>
        <form action="page_accueil.php">
            <label for="nom">Nom:</label>
            <input type="text" id="nom" name="nom" required>

            <label for="email">Email:</label>
            <input type="email" id="email" name="email" required>

            <label for="password">Mot de passe:</label>
            <input type="password" id="password" name="password" required>

            <label for="confirm-password">Confirmer le mot de passe:</label>
            <input type="password" id="confirm-password" name="confirm-password" required>

            <label for="adresse">Adresse:</label>
            <input type="text" id="adresse" name="adresse" required>

            <label for="ville">Ville:</label>
            <input type="text" id="ville" name="ville" required>

            <label for="code-postal">Code Postal:</label>
            <input type="number" id="code-postal" name="code-postal" required>

            <label for="photo-profil">Photo de profil:</label>
            <input type="file" id="photo-profil" name="photo-profil" class="file-input" required>

            <input type="submit" value="S'inscrire">
        </form>
    </div>
</body>
</html>



