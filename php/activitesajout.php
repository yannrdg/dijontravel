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
</body>

</html>

<?php

include 'config.php';

    
    $titre = $_POST['titre'];
    $lieu = $_POST['lieu'];
    $description = $_POST['description'];
    $site = $_POST['site'];
    $type = $_POST['type'];

    
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
            INSERT INTO Activites(titre, lieu, description, site, type)
            VALUES(:titre, :lieu, :description, :site, :type)");  
        $sth->bindParam(':titre',$titre);
        $sth->bindParam(':lieu',$lieu);
        $sth->bindParam(':description',$description);
        $sth->bindParam(':site',$site);
        $sth->bindParam(':type',$categorie);
        $sth->execute();
        
        //On renvoie l'utilisateur vers la page de remerciement
       header('Location: activites.php');


    }
    catch(PPDOException $Exception){
        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
    }