<?php 
session_start();  // Démarre la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $nom_utilisateur = $_SESSION['nom_utilisateur']; 
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_accueil.css">
    <title>Page d'Accueil</title>
</head>

<body>
    <div class="container">
        <div class="flex">
            <div class="flex1 flex">
                <div class="menu">
                    <div onclick="toggleMenu()">
                        <img src="C:\xampp\htdocs\FLATTY\simg\menu.png" class="menuImage" />
                    </div>
                    <div class="menu-content" id="menuContent">
                        <a href="#">Categories appartements</a>
                        <a href="#">Maisons</a>
                        <a href="#">Villes</a>
                    </div>
                </div>
                <div><img class="logo" src="logo.png" /></div>
            </div>

            <div class="flex6">
                <div class="search-container">
                    <input class="input" placeholder="Rechercher" />
                    <img class="magnifierImage" src="magnifier.png" />
                </div>
                <div class="tab">
                    <a href="page_accueil.html" class="width20">Page d'accueil</a>
                    <a href="filtre.html" class="width20">Filtre</a>
                    <a href="mes_annonces.html" class="width20">Mes annonces</a>
                    <a href="coup_decoeur.html" class="width20">Coup de cœur</a>
                </div>
            </div>

            <div class="flex1 flex auth-links">
                <div>
                    <img src="file:///C:/Users/tayab/MVC%20Flaty/vue/page_accueil.html" class="width30" />
                    <span class="rightText">Messagerie</span>
                </div>

                <div>
                    <img src="exit.png" class="width30" />
                    <a href="page_login.html" class="rightText">Login</a>
                </div>

                <div>
                    <img src="img/exit.png" class="width30" />
                    <a href="page_inscription.html" class="rightText">Inscription</a>
                </div>

            </div>
        </div>

        <!-- Ajout du message de bienvenue sous la section des catégories -->
        <div class="welcome-message-container">
            <?php if (isset($nom_utilisateur)): ?>
                <div class="welcome-message">
                    <span>Bienvenue, <?php echo htmlspecialchars($nom_utilisateur); ?> !</span>
                </div>
            <?php endif; ?>
        </div>

    </div>
</body>
</html>