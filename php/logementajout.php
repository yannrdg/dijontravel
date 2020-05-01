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
    <title>Document</title>
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
        <h1>Formulaire offre logement</h1>

        <form action="" method="POST">
            <div>
                <label for="titre">Titre :</label><input type="text" name="titre" id="titre">
            </div>
            <div>
                <label for="lieu">Adresse :</label><input type="text" name="lieu" id="lieu">
            </div>
            <div>
                <label for="prix">Prix minimum par pers/nuit <i>(en €)</i> :</label><input type="number" name="prix" id="prix">
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

if(isset($_POST['submit']))
{
    if(!empty($_POST['titre']) AND !empty($_POST['lieu']) AND !empty($_POST['prix']) AND !empty($_POST['nbrpers']) AND !empty($_POST['lien']) AND !empty($_POST['contact']) AND !empty($_POST['type']))
    {
        $reqtitre = $bdd->prepare("SELECT * FROM Logement WHERE titre = ?");
        $reqtitre->execute(array($titre));
        $titreexist = $reqtitre->rowCount();
        if($titreexist == 0)
        {
    
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
            }
            else
            {
                $erreur2 = "Titre déjà existant";
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
            <a href="">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="">Nous contacter</a>
        </div>
    </footer>

</body>

</html>