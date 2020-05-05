<?php 
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$info = $bdd->prepare("SELECT * FROM Restaurant ORDER BY date DESC");
$exec = $info->execute();
$restaurant = $info->fetchAll();

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="author" content="BELIN Anthony">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Restauration</title>
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/categories.css">
    <script src="../script/global.js" async></script>
    <link rel="icon" href="../medias/logooo.png" />
</head>

<body id="restaurant">
<?php
include ('../includes/header.php');
?>

    <section class="banniere">
        <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Frestau.png?v=1575882186705"
            alt="logo restauration">
        <h2>Restauration</h2>
    </section>
    <nav>
        <button>Kebabs Tacos</button>
        <button>Pizzerias</button>
        <button>Restaurants</button>
        <button>Brasseries</button>
        <button>Tous</button>
    </nav>
    <a href="restaurantajout.php">+ Ajouter une annonce</a>
    <main>
            <?php foreach ($restaurant as $items): ?>  
                <section class="<?= $items['type']?>">
            <div>
                <h3><?= $items['titre']?></h3>
                <p><?= $items['lieu']?></p>
                <p>Prix : <?= $items['prix']?>€ minimum</p>
                <p><?= $items['nbrpers']?> personnes</p>
                <p>Pour plus d'informations ou pour réserver :</p>
                <p><?= $items['contact']?></p>
                <br />
                <a href="<?= $items['lien']?>"><?= $items['lien']?></a>
                <p>Ajouté par : <?= $items['email']?></p>
            </div>
            <img src="../medias/<?= $items['file']?>">
        </section>
            <?php endforeach; ?>
    </main>
<?php
include ('../includes/footer.php');
?>
</body>

</html>
