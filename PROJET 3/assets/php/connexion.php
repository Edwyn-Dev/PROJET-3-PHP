<?php
session_start();
include 'header.php';
?>

<h1>Connexion</h1>
<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}
?>
<form action="traitement_connexion.php" method="post">
    <input type="text" id="identifiant" name="identifiant" placeholder="Nom d'utilisateur ou Email" required><br>
    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required><br>
    <input type="submit" value="Se connecter">
</form>

<?php include 'footer.php'; ?>
