<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/index.css">
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
            <label for="prix">Prix pas pers/nuit :</label><input type="texte" name="prix" id="prix">
        </div>
        <div>
            <label for="nbrpers">Nombre de personnes :</label><input type="number" name="nbrpers" id="nbrpers">
        </div>
        <div>
            <label for="contact">Contact :</label><input type="text" name="contact" id="contact">
        </div>
        <div>
            <label for="lien">Lien pour réserver :</label><input type="text" name="lien" id="lien">
        </div>
        <div>
            <label for="type">Catégorie :</label><select name="type" id="type">
                <option value="camping">Camping</option>
                <option value="gite">Gîte</option>
                <option value="chbrehote">Chambre d'hôte</option>
                <option value="hotel">Hôtel</option>

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
//On se connecte à la BDD
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
    $titre = $_POST['titre'];
    $lieu = $_POST['lieu'];
    $prix = $_POST['prix'];
    $nbrpers = $_POST['nbrpers'];
    $lien = $_POST['lien'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $email3 = $_SESSION['email'];

    
    try{

        if ($type === 'camping'){
            $categorie = "un";
        } elseif ($type === 'gite') {
            $categorie = "deux";
        } elseif ($type === 'chbrehote') {
            $categorie = "trois";
        } elseif ($type === 'hotel') {
            $categorie = "quatre";
        }
            


         //On insère les données reçues
        $sth = $bdd->prepare("
            INSERT INTO Logement(titre, lieu, prix, nbrpers, lien, contact, type, email)
            VALUES(:titre, :lieu, :prix, :nbrpers, :lien, :contact, :type, :email)");  
        $sth->bindParam(':titre',$titre);
        $sth->bindParam(':lieu',$lieu);
        $sth->bindParam(':prix',$prix);
        $sth->bindParam(':nbrpers',$nbrpers);
        $sth->bindParam(':lien',$lien);
        $sth->bindParam(':contact',$contact);
        $sth->bindParam(':type',$categorie);
        $sth->bindParam(':email',$email3);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
       header('Location: logement.php');


    }
    catch(PPDOException $Exception){
        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
    }