<?php
session_start();
if(isset($_SESSION['email']))
{
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/formulaireajout.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Offre activités</title>
</head>

<body>
    <header>
        <div>
            <a href="../index.php">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
                <a href="deconnexion.php" class="co">Déconnexion</a>
                <a href="profil.php" class="img"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
                        alt="profil"></a>
            </div>
        </div>
    </header>
    <main>
        <h1>Formulaire Activites</h1>
        <form action="" method="POST">
            <div>
                <label for="titre">Titre :</label><input type="text" name="titre" id="titre">
            </div>
            <div>
                <label for="lieu">Adresse :</label><input type="text" name="lieu" id="lieu">
            </div>
            <div>
                <label for="description">Description <i>(350 caractères maximum (espaces compris))</i> :</label><input
                    type="texte" maxlength="350" name="description" id="description">
            </div>
            <div>
                <label for="site">Site web de l'activité :</label><input type="texte" name="site" id="site">
            </div>
            <div>
                <label for="type">Catégorie :</label><select name="type" id="type">
                    <option value="sport">Sport</option>
                    <option value="cult">Lieu culturel</option>
                    <option value="festival">Festival</option>
                    <option value="autre">Autre</option>

                </select>
            </div>
            <div id="submit">
                <input type="submit" value="Envoyer" name="submit">
            </div>
        </form>

        <?php

include 'config.php';
//On se connecte à la BDD
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    
   
$titre = $_POST['titre'];
$lieu = $_POST['lieu'];
$description = $_POST['description'];
$site = $_POST['site'];
$type = $_POST['type'];
$email2 = $_SESSION['email'];

    if(isset($_POST['submit']))
    {
        if(!empty($_POST['titre']) AND !empty($_POST['lieu']) AND !empty($_POST['description']) AND !empty($_POST['site']) AND !empty($_POST['type']))
        {   
            $reqtitre = $bdd->prepare("SELECT * FROM Activites WHERE titre = ?");
            $reqtitre->execute(array($titre));
            $titreexist = $reqtitre->rowCount();
            if($titreexist == 0)
            {
                try{

                    if ($type === 'sport'){
                        $categorie = "un";
                    } elseif ($type === 'cult') {
                        $categorie = "deux";
                    } elseif ($type === 'festival') {
                        $categorie = "trois";
                    } elseif ($type === 'autre') {
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
            }
            else
            {
                $erreur2 = "Ce titre est déjà existant";
            }
        }
        else
        {
        $erreur2 = "Il manque des informations";
        }        
    }
}
else
{
    header('Location: ../html/transitionco.html');
}

?>
        <p>
            <?php
        if(isset($erreur2))
        {
            echo $erreur2;
        }
        ?>
        </p>
    </main>
    <footer>
    <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/contact/">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/contact/">Nous contacter</a>
        </div>
    </footer>

</body>

</html>