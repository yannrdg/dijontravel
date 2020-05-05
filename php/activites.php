<?php 
session_start();

include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$info = $bdd->prepare("SELECT * FROM Activites ORDER BY date DESC");
$exec = $info->execute();
$activites = $info->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="Yann" content="author">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Activités</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/categories.css">
    <script src="../script/global.js" async></script>
</head>

<body id="activites">
<?php
include ('../includes/header.php');
?>
    <section class="banniere">
        <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogemetn.png?v=1575622625201"
            alt="logo activites">
        <h2>Activités</h2>
    </section>

    <nav>
        <button>Sports</button>
        <button>Lieux culturels</button>
        <button>Festivals</button>
        <button>Autres</button>
        <button>Tous</button>
    </nav>
    <a href="activitesajout.php">+ Ajouter une annonce</a>
    <main>
            <?php foreach ($activites as $items): ?>  
                <section class="<?= $items['type']?>">
            <div>
                <h3><?= $items['titre']?></h3>
                <p><?= $items['lieu']?></p>
                <p><?= $items['description']?></p>
                <br />
                <p>Pour plus d'informations ou pour réserver :</p>
                <a href="<?= $items['site']?>"><?= $items['site']?></a>
                <p>Ajouté par : <?= $items['email']?></p>
            </div>
            <img src="../medias/<?= $items['file']?>"
                alt="lavapeur">
        </section>
            <?php endforeach; ?>
    </main>
<?php
include ('../includes/footer.php');
?>
</body>

</html>
