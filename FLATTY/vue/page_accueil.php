<?php 
session_start();  // Démarre la session

// Vérifier si l'utilisateur est connecté
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $nom_utilisateur = $_SESSION['nom_utilisateur']; 
}

// Connexion à la base de données
try {
    $pdo = new PDO("mysql:host=localhost;dbname=messagerie", "root", ""); // Modifier les identifiants
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}

// Récupérer les 5 derniers messages pour l'utilisateur connecté
$messages = [];
if (isset($nom_utilisateur)) {
    $stmt = $pdo->prepare("SELECT sender, message, timestamp 
                           FROM messages 
                           WHERE receiver = ? 
                           ORDER BY timestamp DESC 
                           LIMIT 5");
    $stmt->execute([$nom_utilisateur]);
    $messages = $stmt->fetchAll(PDO::FETCH_ASSOC);
}


// Tableau des chemins des images d'annonces
$annonces = [
    "image_annonces_1.png",
    "image_annonces_2.png",
    "image_annonces_3.png",
    "image_annonces_4.png",
    "image_annonces_5.png",
    "image_annonces_6.png",
    "image_annonces_7.png",
    "image_annonces_8.png",
    "image_annonces_9.png"
];
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="page_accueil.css">
    <title>Page d'Accueil</title>
    <style>
        .grid-container {
            display: grid;
            grid-template-columns: repeat(3, 1fr); /* 3 images par ligne */
            row-gap: 20px; /* Espacement entre les images */
            justify-items: center;
            margin-bottom: 50px;
            margin-top: 50px;
        }
        .grid-container img {
            width: 420px;
            height: 250px;
            object-fit: cover;
            border: 10px solid #ddd;
            border-radius: 50px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.2);
            transition: transform 0.3s;
        }
        .grid-container img:hover {
            transform: scale(1.05);
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="flex">
            <div class="flex1 flex">
                <div class="menu">
                    <div onclick="toggleMenu()">
                        <img src="menu.png" class="menuImage" />
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
                    <img class="magnifierImage" src="magnifier_recherche.png" />
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
                    <img src="information.png" class="width30" />
                    <a href="messagerie.php" class="rightText">Messagerie</>
                </div>

                <div>
                    <img src="exit.png" class="width30" />
                    <a href="page_login.html" class="rightText">Login</a>
                </div>

                <div>
                    <img src="inscription.png" class="width30" />
                    <a href="page_inscription.php" class="rightText">Inscription</a>
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

        <a href="messages_recents.php">Voir vos messages récents</a>


        <!-- Section des annonces -->
        <div class="grid-container">
            <?php foreach ($annonces as $annonce): ?>
                <div class="annonce-item">
    <img src="<?php echo htmlspecialchars($annonce); ?>" alt="Annonce" />
    <div class="annonce-text">
        <h3>Type de logement</h3>
        <p>Localisation : Paris, France</p>
        <p>Surface : 40m²</p>
        <p>Nombre de lits : 2</p>
        <p>Prix : Gratuit</p>
               </div>
        </div>

            <?php endforeach; ?>
        </div>
    </div>
</div>

</div>

    </div>
</body>
</html>

