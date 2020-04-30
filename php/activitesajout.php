<?php
session_start();
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="index.css">
    <title>Document</title>
</head>

<body>
    <h1>Formulaire HTML</h1>

    <form action="" method="POST">
        <div>
            <label for="titre">Titre :</label><input type="text" name="titre" id="titre">
        </div>
        <div>
            <label for="lieu">Adresse :</label><input type="text" name="lieu" id="lieu">
        </div>
        <div>
            <label for="description">Description <i>(350 caractères maximum (espaces compris))</i> :</label><input type="texte" maxlength="350" name="description" id="description">
        </div>
        <div>
            <label for="site">Site web de l'activité :</label><input type="texte" name="site" id="site">
        </div>
        <div>
            <label for="type">Catégorie :</label><select name="type" id="type">
                <option value="sport">Sport</option>
                <option value="visite">Visites</option>
                <option value="lieuouv">Lieux ouverts</option>
                <option value="fete">Fêtes</option>

            </select>
        </div>
        <div id="submit">
            <input type="submit" value="Envoyer" name="submit">
        </div>
    </form>
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

<?php

include 'config.php';

    
    $titre = $_POST['titre'];
    $lieu = $_POST['lieu'];
    $description = $_POST['description'];
    $site = $_POST['site'];
    $type = $_POST['type'];
    $email2 = $_SESSION['email'];

    
    try{

        if ($type === 'sport'){
            $categorie = "un";
        } elseif ($type === 'visite') {
            $categorie = "deux";
        } elseif ($type === 'lieuouv') {
            $categorie = "trois";
        } elseif ($type === 'fete') {
            $categorie = "quatre";
        }
            

        //On se connecte à la BDD
        $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

         //On insère les données reçues
        $sth = $bdd->prepare("
            INSERT INTO Activites(titre, lieu, description, site, type, email)
            VALUES(:titre, :lieu, :description, :site, :type, :email)");  
        $sth->bindParam(':titre',$titre);
        $sth->bindParam(':lieu',$lieu);
        $sth->bindParam(':description',$description);
        $sth->bindParam(':site',$site);
        $sth->bindParam(':type',$categorie);
        $sth->bindParam(':email',$email2);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
       header('Location: activites.php');


    }
    catch(PPDOException $Exception){
        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
    }