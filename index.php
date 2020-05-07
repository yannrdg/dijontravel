<?php
session_start();
include 'php/config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

?>
<!DOCTYPE html>
<html lang="fr" dir="ltr">

<head>
    <meta charset="utf-8">
    <title>Page d'accueil</title>
    <link rel="icon" href="./medias/logooo.png" />
    <link rel="stylesheet" href="style/global.css">
    <link rel="stylesheet" href="style/index.css">
</head>

<body>
<header>
        <div>
            <a href="index.php">
                <img src="medias/logooo.png"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
                <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
                <a href="php/deconnexion.php" class="co">Déconnexion</a>
                <a href="php/profil.php" class="img">
                    <img src="medias/profil.png"
                        alt="profil"></a>
                <?php 
        }
        else 
        {
        ?>
                <a href="php/connexion.php" class="co">Connexion</a>
                <a href="php/inscription.php" class="co">Inscrivez-vous</a>
                <?php 
        }
        ?>
            </div>
        </div>
    </header>

    <div class="slider-frame">
        <div class="slide-image">
            <div class="img-container">
                <img src="medias/tram.jpg" alt="tram">
            </div>
            <div class="img-container">
                <img src="medias/darcy.jpg" alt="darcy">
            </div>
            <div class="img-container">
                <img src="medias/gargouille.jpg" alt="gargouille">
            </div>
            <div class="img-container">
                <img src="medias/rep.jpg" alt="rep">
            </div>
        </div>
    </div>

    <nav>
        <a href="php/restaurant.php">
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Frestau.png?v=1575882186705"
                alt="logo restau">
            <p>Restauration</p>
        </a>
        <a href="php/activites.php">
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fkayak.png?v=1575882144385"
                alt="logo kayak">
            <p>Activités</p>
        </a>
        <a href="php/logement.php">
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogemetn.png?v=1575622625201"
                alt="logo logements">
            <p>Logements</p>
        </a>
    </nav>
    <main>
        <section>
            <h2>Les activités préférées de nos étudiants</h2>
            <div>
                <article>
                    <a href="https://www.dijon.fr/Sortir-Bouger/Balades-nature/Au-fil-de-l-eau/Lac-Kir"><img
                            src="medias/kayak.jpeg"
                            alt="kayak">
                        <h3>Lac Kir - Kayak entre amis ou en famille</h3>
                    </a>

                </article>
                <article>
                    <a href="https://www.lavapeur.com/"><img
                            src="medias/lavapeur.jpg"
                            alt="concert">
                        <h3>La vapeur - Concerts toute l'année pour tous les jeunes</h3>
                    </a>
                </article>
                <article>
                    <a href="https://beaux-arts.dijon.fr/">
                        <img src="medias/museebeauart.jpg"
                            alt="musée">
                        <h3>Musée des Beaux arts - Exposition temporaire Yan Pei Ming</h3>
                    </a>
                </article>
            </div>
        </section>
        <section>
            <h2>Nos sugestions pour vous à petits prix</h2>
            <div>
                <article>
                    <a
                        href="https://www.tripadvisor.fr/Restaurant_Review-g187111-d4171016-Reviews-Les_Gourmands_Disent-Dijon_Cote_d_Or_Bourgogne_Franche_Comte.html"><img
                            src="medias/gourmandisent.jpg"
                            alt="restau1">
                            <h3>Les Gourmands...disent-36 rue de Fontaine les Dijon, 21000 Dijon</h3>
                        </a>
                </article>
                <article>
                    <a href="https://www.destinationdijon.com/moments-a-vivre/le-parcours-de-la-chouette/"><img
                            src="medias/chouette.jpg"
                            alt="chouette">
                            <h3>Visiste de Dijon sur la piste de la Chouette</h3>
                        </a>
                </article>
                <article>
                    <a
                        href="https://www.tripadvisor.fr/Restaurant_Review-g187111-d806926-Reviews-Version_Latine-Dijon_Cote_d_Or_Bourgogne_Franche_Comte.html"><img
                            src="medias/version-latine.jpg"
                            alt="restau2">
                            <h3>Version Latine - 16 rue Odebert, 21000 Dijon</h3>
                        </a>
                </article>
            </div>
        </section>
    </main>

<?php
include ('includes/footer.php');
?>
</body>

</html>