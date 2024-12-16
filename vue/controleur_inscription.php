<?php



require 'connexion.php'; // Assurez-vous que ce fichier est correctement inclus

// Vérification que les champs nécessaires sont envoyés via POST
if (isset($_POST["nom"]) && isset($_POST["password"])) {

    // Créer une instance de la classe Database et se connecter à la base
    $database = new Database();
    $conn = $database->connect();

    // Récupérer les données du formulaire
    $nom = $_POST["nom"];
    $password = $_POST["password"];

    // Préparer la requête SQL pour insérer l'utilisateur
    $query = "INSERT INTO utilisateurs (nom_utilisateur, mot_de_passe) VALUES (:nom, :password)";
    
    // Préparer la requête
    $stmt = $conn->prepare($query);
    
    // Exécuter la requête avec les valeurs
    $stmt->execute([
        ':nom' => $nom, 
        ':password' => password_hash($password, PASSWORD_DEFAULT)  // Hachage du mot de passe
    ]);
    
    // Rediriger vers la page d'accueil après l'inscription
    header('Location: page_accueil.php');
    exit;

} else {
    // Afficher un message d'erreur si les champs sont vides
    echo "Veuillez remplir tous les champs.";
}

?>
