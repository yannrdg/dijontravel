<?php
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

if(isset($_SESSION['prenom']))
{

?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="yann" content="auhtor">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/pageprofil.css">
    <title>Acceuil</title>
</head>
<body>
<header>
        <div>
        <a href="../index.php">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
            <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
        <a href="deconnexion.php" class="co">Déconnexion</a>
        <a href="profil.php" class="img"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
                        alt="profil"></a>
        <?php 
        }
        else 
        {
        ?>
            <a href="connexion.php" class="co">Connexion</a>
            <a href="inscription.php" class="co">Inscrivez-vous</a>
        <?php 
        }
        ?> 
            </div>     
        </div>
    </header>
    <main>
        <!--<img src="../medias/Select_logo.png" alt="logo select">-->
        <p>Profil de <?php echo $_SESSION["prenom"]; ?></p>
        <a href="deconnexion.php">Déconnexion</a>
    </main>
</body>
</html>
<?php
}
