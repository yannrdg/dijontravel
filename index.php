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
        <a href="php/profil.php" class="img"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
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

    <div id="caroussel">
        <div class="slideshow-container">

            <div class="mySlides fade">
                <div class="numbertext"></div>
               <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fphotodijon.jpg?v=1584698935054" alt="">
            </div>

            <div class="mySlides fade">
                <div class="numbertext"></div>
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fphoto%20dijon.jpg?v=1584698935136"
                    alt="">
            </div>

            <div class="mySlides fade">
                <div class="numbertext"></div>
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fphotodijon1.jpg?v=1584698935875"
                    alt="">
            </div>
            <a class="prev" onclick="plusSlides(-1)">
                </a> <a class="next" onclick="plusSlides(1)">>
            </a>
        </div>
        <br>

        <div style="text-align:center">
            <span class="dot"></span>
            <span class="dot"></span>
            <span class="dot"></span>
        </div>



    </div>


    <nav>
        <a href="php/restaurant.php">
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Frestau.png?v=1575882186705"
                alt="logo restau">
            <p>Restaurants</p>
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
        <a href="html/carte.html">
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fmap.png?v=1575882153523" alt="map">
            <p>Carte</p>
        </a>
    </nav>
    <main>
        <section>
            <h2>Les activités préférées de nos étudiants</h2>
            <div>
                <article>
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fkayak.jpg?v=1575882141127"
                        alt="kayak">
                    <h3>Lac Kir - Kayak entre amis ou en famille</h3>
                </article>
                <article>
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fconcert.jpg?v=1575882118158"
                        alt="concert">
                    <h3>La vapeur - Concerts toute l'année pour tous les jeunes</h3>
                </article>
                <article>
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fmusee%20bo%20art.jpg?v=1575882170999"
                        alt="musée">
                    <h3>Musée des Beaux arts - Exposition temporaire Yan Pei Ming</h3>
                </article>
            </div>
        </section>
        <section>
            <h2>Nos sugestions pour vous à petits prix</h2>
            <div>
                <article>
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fgourmandise.webp?v=1575882131739"
                        alt="restau1">
                    <h3>Les Gourmands...disent-36 rue de Fontaine les Dijon, 21000 Dijon</h3>
                    <p>Restaurant conviviale qui vous propose de délicieuses crêpes salés et sucrés et salade pour un
                        pris
                        très
                        abordable, afin de passer un bon repas</p>
                    <p>15€-30€</p>
                </article>
                <article>
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Feglise.jpg?v=1575882127284"
                        alt="eglise">
                    <h3>Visiste de Dijon sur la piste de la Chouette</h3>
                    <p>Suivez la piste de la Chouette dans les rues du centre ville de Dijon. Vous pourrez découvrir la
                        ville sous
                        tous ses visages.</p>
                    <p>Totalement gratuit et sympathique</p>
                </article>
                <article>
                    <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fversion%20latine.jpg?v=1575882205784"
                        alt="restau2">
                    <h3>Version Latine - 16 rue Odebert, 21000 Dijon</h3>
                    <p>Pizzéria conviviale et chaleureuse. De très bons produits proposés; pizzas, pâtes, tous aux
                        saveures
                        de l'Italie.</p>
                    <p>15€-30€</p>
                </article>
            </div>
        </section>
    </main>

    <footer>
        <div>
            <a href="">Qui sommes-nous ?</a>
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