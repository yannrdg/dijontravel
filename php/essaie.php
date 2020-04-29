<?php
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>Profil de 
        <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
        <p>bonjour</p>
        <?php 
        }
        else 
        {
        ?>
            <p>salut</p>
        <?php 
        }
        ?>
    </p>
    <a href="../index.php">Page ac</a>
</body>
</html>