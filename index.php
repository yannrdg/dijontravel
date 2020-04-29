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
            <a href="index.html">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
            <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
        <a href="php/deconnexion.php" class="co">Déconnexion</a>
        <a href="php/essaie.php" class="img"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
                        alt="profil"></a>
        <?php 
        }
        else 
        {
        ?>
            <a href="php/connexion.php" class="co">Connexion</a>
            <a href="php/formulaire.php" class="co">Inscrivez-vous</a>
        <?php 
        }
        ?> 
            </div>     
        </div>
    </header>
    <section>
        <h3>Trouver des logements, des activités et encore plus sur DIJ'ON TRAVEL. Venez découvrir notre ville !</h3>
            <form>
                <div>
                    <label for="arrivée">Arrivée</label>
                    <input type="date" name="arrivée" id="arrivée" placeholder="jj/mm/aaaa">
                </div>
                <div>
                    <label for="départ">Départ</label>
                    <input type="date" name="départ" id="départ" placeholder="jj/mm/aaaa">
                </div>
                <div>
                    <label for="budget">Budget</label>
                    <input type="text" name="budget" id="budget" placeholder="...€">
                </div>
                <input type="submit" value="VALIDER">
            </form>
    </section>

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
        <a href="html/carte.html">
            <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fmap.png?v=1575882153523" alt="map">
            <p>Carte</p>
        </a>
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