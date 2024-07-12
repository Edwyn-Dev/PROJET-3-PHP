<?php
session_start();
include 'db_connect.php';

// Récupére les données du formulaire
$identifiant = $_POST['identifiant'];
$mot_de_passe = $_POST['mot_de_passe'];

// Valide les données
if (empty($identifiant) || empty($mot_de_passe)) {
    $_SESSION['error'] = 'Veuillez remplir tous les champs.';
    header('Location: connexion.php');
    exit;
}

// Vérifie les informations d'identification
$stmt = $pdo->prepare('SELECT * FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?');
$stmt->execute([$identifiant, $identifiant]);
$utilisateur = $stmt->fetch();

if ($utilisateur && password_verify($mot_de_passe, $utilisateur['mot_de_passe'])) {
    $_SESSION['utilisateur_id'] = $utilisateur['id'];
    header('Location: tableau_de_bord.php');
    exit;
} else {
    $_SESSION['error'] = 'Identifiants incorrects.';
    header('Location: connexion.php');
    exit;
}
?>
