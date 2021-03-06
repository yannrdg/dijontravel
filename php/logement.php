<?php 
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$info = $bdd->prepare("SELECT * FROM Logement ORDER BY date DESC");
$exec = $info->execute();
$logement = $info->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="Yann" content="author">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Logements</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/categories.css">
    <link rel="icon" href="../medias/logooo.png" />
    <script src="../script/global.js" async></script>
</head>

<body id="logement">
<?php
include ('../includes/header.php');
?>

    <section class="banniere">
        <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogemetn.png?v=1575622625201"
            alt="logo logement">
        <h2>Logements</h2>
    </section>

    <nav>
        <button id="un">Campings</button>
        <button id="deux">Gîtes</button>
        <button id="trois">Chambres d'hôtes</button>
        <button id="quatre">Hôtels</button>
        <button id="cinq">Tous</button>
    </nav>
    <a href="logementajout.php">+ Ajouter une annonce</a>
    <main>
            <?php foreach ($logement as $items): ?>  
                <section class="<?= $items['type']?>">
            <div>
                <h3><?= $items['titre']?></h3>
                <p><?= $items['lieu']?></p>
                <p>Prix : <?= $items['prix']?>€ la nuit/pers</p>
                <p><?= $items['nbrpers']?> personnes</p>
                <p>Pour plus d'informations ou pour réserver :</p>
                <p><?= $items['contact']?></p>
                <br />
                <a href="<?= $items['lien']?>"><?= $items['lien']?></a>
                <p>Ajouté par : <?= $items['email']?></p>
            </div>
            <img src="../medias/<?= $items['file']?>"
                alt="gites">
        </section>
            <?php endforeach; ?>
    </main>
<?php
include ('../includes/footer.php');
?>
</body>

</html>
