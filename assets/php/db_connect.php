<?php
$dsn = 'mysql:host=localhost;dbname=projet-3';
$username = 'root';
$password = '';
$options = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC
];

try {
    $pdo = new PDO($dsn, $username, $password, $options);
} catch (PDOException $e) {
    ?>
    <script>alert('Erreur de connexion : ' + $e->getMessage())</script>
    <?php
}
?>
