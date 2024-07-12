<?php
session_start();
include 'header.php';
?>

<h1>Inscription</h1>
<?php
if (isset($_SESSION['error'])) {
    echo '<p style="color: red;">' . $_SESSION['error'] . '</p>';
    unset($_SESSION['error']);
}
?>
<form action="traitement_inscription.php" method="post">
    <label for="nom_utilisateur">Nom</label>
    <input type="text" id="nom_utilisateur" name="nom_utilisateur" placeholder="Nom d'utilisateur" required><br>
    <label for="email">Email</label>
    <input type="email" id="email" name="email" placeholder="Email" required><br>
    <label for="email">Mot de passe</label>
    <input type="password" id="mot_de_passe" name="mot_de_passe" placeholder="Mot de passe" required><br>
    <input type="submit" value="S'inscrire">
</form>

<?php include 'footer.php'; ?>