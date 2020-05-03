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
    <script src="script/index.js" async></script>
</head>

<body>
    <header>
        <div>
            <a href="index.php">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
                <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
                <a href="php/deconnexion.php" class="co">Déconnexion</a>
                <a href="php/profil.php" class="img">
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
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

    <footer>
        <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/contact/">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/contact/">Nous contacter</a>
        </div>
        <div>
            <a href="https://fr-fr.facebook.com/VilledeDijon/"><svg width="4vw" height="6vh" aria-hidden="true"
                    focusable="false" data-prefix="fab" data-icon="facebook-square"
                    class="svg-inline--fa fa-facebook-square fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                    </path>
                </svg></a>
            <a href="https://www.instagram.com/villededijon/"> <svg width="4vw" height="6vh" aria-hidden="true"
                    focusable="false" data-prefix="fab" data-icon="instagram"
                    class="svg-inline--fa fa-instagram fa-w-14" role="img" xmlns="http://www.w3.org/2000/svg"
                    viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M224.1 141c-63.6 0-114.9 51.3-114.9 114.9s51.3 114.9 114.9 114.9S339 319.5 339 255.9 287.7 141 224.1 141zm0 189.6c-41.1 0-74.7-33.5-74.7-74.7s33.5-74.7 74.7-74.7 74.7 33.5 74.7 74.7-33.6 74.7-74.7 74.7zm146.4-194.3c0 14.9-12 26.8-26.8 26.8-14.9 0-26.8-12-26.8-26.8s12-26.8 26.8-26.8 26.8 12 26.8 26.8zm76.1 27.2c-1.7-35.9-9.9-67.7-36.2-93.9-26.2-26.2-58-34.4-93.9-36.2-37-2.1-147.9-2.1-184.9 0-35.8 1.7-67.6 9.9-93.9 36.1s-34.4 58-36.2 93.9c-2.1 37-2.1 147.9 0 184.9 1.7 35.9 9.9 67.7 36.2 93.9s58 34.4 93.9 36.2c37 2.1 147.9 2.1 184.9 0 35.9-1.7 67.7-9.9 93.9-36.2 26.2-26.2 34.4-58 36.2-93.9 2.1-37 2.1-147.8 0-184.8zM398.8 388c-7.8 19.6-22.9 34.7-42.6 42.6-29.5 11.7-99.5 9-132.1 9s-102.7 2.6-132.1-9c-19.6-7.8-34.7-22.9-42.6-42.6-11.7-29.5-9-99.5-9-132.1s-2.6-102.7 9-132.1c7.8-19.6 22.9-34.7 42.6-42.6 29.5-11.7 99.5-9 132.1-9s102.7-2.6 132.1 9c19.6 7.8 34.7 22.9 42.6 42.6 11.7 29.5 9 99.5 9 132.1s2.7 102.7-9 132.1z">
                    </path>
                </svg></a>
        </div>
    </footer>
</body>

</html>