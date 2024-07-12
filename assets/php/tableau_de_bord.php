<?php
session_start();

// Vérifie si l'utilisateur est connecté
if (!isset($_SESSION['utilisateur_id'])) {
    header('Location: connexion.php');
    exit;
}

include 'header.php';
?>
    <h1>Bienvenue sur votre tableau de bord</h1>
    <a href="deconnexion.php">Se déconnecter</a>
<?php include 'footer.php'; ?>
