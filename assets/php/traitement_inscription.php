<?php
session_start();
include 'db_connect.php';

// Récupére les données du formulaire
$nom_utilisateur = $_POST['nom_utilisateur'];
$email = $_POST['email'];
$mot_de_passe = $_POST['mot_de_passe'];

// Valide les données
if (empty($nom_utilisateur) || empty($email) || empty($mot_de_passe)) {
    $_SESSION['error'] = 'Veuillez remplir tous les champs.';
    header('Location: inscription.php');
    exit;
}

// Vérifie si le nom d'utilisateur ou l'email est déjà utilisé
$stmt = $pdo->prepare('SELECT id FROM utilisateurs WHERE nom_utilisateur = ? OR email = ?');
$stmt->execute([$nom_utilisateur, $email]);
if ($stmt->fetch()) {
    $_SESSION['error'] = 'Nom d\'utilisateur ou email déjà utilisé.';
    header('Location: inscription.php');
    exit;
}

// Hache le mot de passe
$mot_de_passe_hache = password_hash($mot_de_passe, PASSWORD_DEFAULT);

// Insére l'utilisateur dans la base de données
$stmt = $pdo->prepare('INSERT INTO utilisateurs (nom_utilisateur, email, mot_de_passe) VALUES (?, ?, ?)');
if ($stmt->execute([$nom_utilisateur, $email, $mot_de_passe_hache])) {
    $_SESSION['success'] = 'Inscription réussie !';
    header('Location: connexion.php');
    exit;
} else {
    $_SESSION['error'] = 'Erreur lors de l\'inscription.';
    header('Location: inscription.php');
    exit;
}
?>
