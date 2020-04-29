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
            <label for="titre"></label>Titre :<input type="text" name="titre" id="titre">
        </div>
        <div>
            <label for="lieu"></label>Adresse :<input type="text" name="lieu" id="lieu">
        </div>
        <div>
            <label for="prix"></label>Prix pas pers/nuit :<input type="texte" name="prix" id="prix">
        </div>
        <div>
            <label for="nbrpers"></label>Nombre de personnes :<input type="number" name="nbrpers" id="nbrpers">
        </div>
        <div>
            <label for="contact"></label>Contact :<input type="text" name="contact" id="contact">
        </div>
        <div>
            <label for="lien"></label>Lien pour réserver :<input type="text" name="lien" id="lien">
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
            INSERT INTO Logement(titre, lieu, prix, nbrpers, lien, contact, type)
            VALUES(:titre, :lieu, :prix, :nbrpers, :lien, :contact, :type)");  
        $sth->bindParam(':titre',$titre);
        $sth->bindParam(':lieu',$lieu);
        $sth->bindParam(':prix',$prix);
        $sth->bindParam(':nbrpers',$nbrpers);
        $sth->bindParam(':lien',$lien);
        $sth->bindParam(':contact',$contact);
        $sth->bindParam(':type',$categorie);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
       header('Location: logement.php');


    }
    catch(PPDOException $Exception){
        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
    }
