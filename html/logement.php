<?php 
include '../php/config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=dijontravel", $username, $password);
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
    <link rel="stylesheet" href="../style/logement.css">
    <script src="../script/global.js" async></script>
</head>

<body>
    <header>
        <div>
            <a href="../index.html">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo princiapl"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
                <a href="formulaire.html">Inscrivez-vous</a>
                <a href="pageprofil.html"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
                        alt="profil"></a>
            </div>
        </div>
    </header>

    <section class="banniere">
        <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogemetn.png?v=1575622625201"
            alt="logo logement">
        <h2>Logements</h2>
    </section>

    <fieldset>
        <label for="date"> Du :</label><input type="date" name="date" id="date">
        <label for="date2"> Au : </label><input type="date" name="date2" id="date2">
        <label for="nb">Nombre de personnes : </label> <input type="number" name="nb" id="nb" min='1' max='30'>
        <input type="submit" value="Envoie">
    </fieldset>
    <nav>
        <button>Campings</button>
        <button>Gîtes</button>
        <button>Chambres d'hôte</button>
        <button>Hôtels</button>
        <button>Tous</button>
    </nav>
    <a href="./ajoutlogement.html">+ Ajouter une annonce</a>
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
            </div>
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fgites%20lilas.jpg?v=1578835905477"
                alt="gites">
        </section>
            <?php endforeach; ?>
    </main>
    <footer>
        <div>
            <p>Nous contacter</p>
        </div>
        <div>
            <p>Aide</p>
        </div>
        <div>
            <p>Réseaux sociaux</p>
            <p>
                <a href="https://twitter.com/"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2FTwitterlogo.png?v=1575622650353"
                        alt="Twitter"></a><a href="https://www.snapchat.com/"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2FSnapchatlogo.png?v=1575622642844"
                        alt="Snapchat"></a><a href="https://www.instagram.com/"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2FInstagramlogo.png?v=1575622619653"
                        alt="Instagram"></a></p>
        </div>
    </footer>
</body>

</html>