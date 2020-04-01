<?php
    
    $titre = $_POST["titre"];
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
            

        //On se connecte à la BDD
        $bdd = new PDO("mysql:host=localhost;dbname=dijontravel", 'root', 'root');
        $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

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
       echo "ok";


    }
    catch(PPDOException $Exception){
        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
    }
?>