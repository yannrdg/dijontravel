<?php 
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

$info = $bdd->prepare("SELECT * FROM Logement");
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
    <script src="../script/global.js" async></script>
</head>

<body id="logement">
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

    <section class="banniere">
        <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogemetn.png?v=1575622625201"
            alt="logo logement">
        <h2>Logements</h2>
    </section>

    <nav>
        <button id="un">Campings</button>
        <button id="deux">Gîtes</button>
        <button id="trois">Chambres d'hôte</button>
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
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fgites%20lilas.jpg?v=1578835905477"
                alt="gites">
        </section>
            <?php endforeach; ?>
    </main>
    <footer>
        <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/106-2/">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="">Nous contacter</a>
        </div>
        <div>
            <a href=""><svg width="4vw" height="6vh" aria-hidden="true" focusable="false" data-prefix="fab"
                    data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                    </path>
                </svg></a>
            <a href=""> <svg width="4vw" height="6vh" aria-hidden="true" focusable="false" data-prefix="fab"
                    data-icon="instagram" class="svg-inline--fa fa-instagram fa-w-14" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                    </path>
                </svg></a>
        </div>
    </footer>
</body>

</html>