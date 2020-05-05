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
    <link rel="stylesheet" href="../style/profil.css">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Profil</title>
</head>

<body>
<?php
include ('../includes/header.php');
?>
    <main>
        <section>
            <h2>Profil</h2>
            <div>
                <p>Nom</p>
                <p><?php echo $_SESSION["nom"]; ?></p>
            </div>
            <div>
                <p>Prénom</p>
                <p><?php echo $_SESSION["prenom"]; ?></p>
            </div>
            <div>
                <p>Adresse mail</p>
                <p><?php echo $_SESSION["email"]; ?></p>
            </div>

        </section>

    </main>
<?php
include ('../includes/footer.php');
?>
</body>

</html>
<?php
}
