<?php
session_start();

// Informations de connexion à la base de données
$servername = "localhost";
$username = "root";  // Identifiant de connexion MySQL
$password = "";      // Mot de passe MySQL (vide par défaut sur XAMPP)
$dbname = "utilisateurs_db";  // Nom de la base de données

try {
    // Créer une connexion PDO
    $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
    
    // Définir le mode d'erreur PDO pour lever les exceptions
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    // Vérifier si le formulaire a été soumis
    if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['nom_utilisateur']) && isset($_POST['mot_de_passe'])) {
        // Récupérer les données du formulaire
        $user = $_POST['nom_utilisateur'];
        $pass = $_POST['mot_de_passe'];
        
        // Préparer la requête SQL pour sélectionner l'utilisateur
        $stmt = $conn->prepare("SELECT id, nom_utilisateur, mot_de_passe FROM utilisateurs WHERE nom_utilisateur = :nom_utilisateur");
        $stmt->bindParam(':nom_utilisateur', $user, PDO::PARAM_STR);
        $stmt->execute();
        
        // Vérifier si l'utilisateur existe
        if ($stmt->rowCount() > 0) {
            // Récupérer l'utilisateur trouvé
            $user_data = $stmt->fetch(PDO::FETCH_ASSOC);
            $stored_password = $user_data['mot_de_passe'];

            // Vérifier si le mot de passe est correct (en texte clair)
            if ($pass === $stored_password) {
                // Initialiser les variables de session
                $_SESSION['loggedin'] = true;
                $_SESSION['nom_utilisateur'] = $user_data['nom_utilisateur'];
                
                // Rediriger vers la page d'accueil ou une autre page après la connexion
                header("Location: page_accueil.php");
                exit();
            } else {
                echo "Nom d'utilisateur ou mot de passe incorrect.";
            }
        } else {
            echo "Nom d'utilisateur ou mot de passe incorrect.";
        }
    }
} catch (PDOException $e) {
    // En cas d'erreur de connexion ou d'exécution
    die("Connection failed: " . $e->getMessage());
}

// Fermer la connexion PDO
$conn = null;
?>