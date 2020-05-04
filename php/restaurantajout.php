<?php
include 'config.php';
//On se connecte à la BDD
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
session_start();
if(isset($_SESSION['email']))
{
    $titre = $_POST['titre'];
    $lieu = $_POST['lieu'];
    $prix = $_POST['prix'];
    $nbrpers = $_POST['nbrpers'];
    $lien = $_POST['lien'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $email1 = $_SESSION['email'];
    $file = $_FILES['file'];
    $fileName = $_FILES['file']['name'];
    $fileTmpName = $_FILES['file']['tmp_name'];
    $fileSize = $_FILES['file']['size'];
    $fileError = $_FILES['file']['error'];
    $fileType = $_FILES['file']['type'];
    $extension = strtolower(substr(strrchr($fileName,'.'),1));
    $extensionValide = array('jpg', 'jpeg', 'png');
    $folder = '../medias/';

    if(isset($_POST['submit']))
        {
            if(!empty($_POST['titre']) AND !empty($_POST['lieu']) AND !empty($_POST['prix']) AND !empty($_POST['lien']) AND !empty($_POST['type']))
            { 

                $reqtitre = $bdd->prepare("SELECT * FROM Restaurant WHERE titre = ?");
                $reqtitre->execute(array($titre));
                $titreexist = $reqtitre->rowCount();
                if($titreexist == 0)
                {
                                    

                        if($fileError == 0)
                        {
                            if($fileSize < 10000000)
                            {

                                if(in_array($extension, $extensionValide))
                                {
                                    move_uploaded_file($fileTmpName, $folder.$fileName);
                                

                                    try
                                    {

                                        if ($type === 'fastfood'){
                                            $categorie = "un";
                                        } elseif ($type === 'pizzeria') {
                                            $categorie = "deux";
                                        } elseif ($type === 'resto') {
                                            $categorie = "trois";
                                        } elseif ($type === 'brasserie') {
                                            $categorie = "quatre";
                                        }
                                
                        
                                        //On insère les données reçues
                                        $sth = $bdd->prepare("
                                            INSERT INTO Restaurant(titre, lieu, prix, nbrpers, lien, contact, type, email, file)
                                            VALUES(:titre, :lieu, :prix, :nbrpers, :lien, :contact, :type, :email, '$fileName')");  
                                        $sth->bindParam(':titre',$titre);
                                        $sth->bindParam(':lieu',$lieu);
                                        $sth->bindParam(':prix',$prix);
                                        $sth->bindParam(':nbrpers',$nbrpers);
                                        $sth->bindParam(':lien',$lien);
                                        $sth->bindParam(':contact',$contact);
                                        $sth->bindParam(':type',$categorie);
                                        $sth->bindParam(':email',$email1);
                                        $sth->execute();
                                        
                                        //On renvoie l'utilisateur vers la page de remerciement
                                        header('Location: restaurant.php');
                    
                    
                                    }
                                    catch(PPDOException $Exception){
                                        echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
                                    }

                            }
                            else 
                            {
                                $erreur2 = "Votre image doit être au format png, jpeg ou jpg";
                            }
                        }
                        else
                        {
                            $erreur2 = "Votre image est trop lourde";
                        }
                    }
                    else
                    {
                        $erreur2 = "Une erreur est survenue";
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
<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/formulaireajout.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Offre restaurant</title>
</head>

<body>
<?php
include ('../includes/header.php');
?>
    <main>
        <h1>Ajoutez une offre pour votre restaurant</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="titre">Titre :</label><input type="text" name="titre" id="titre" required value="<?php if(isset($titre)){ echo $titre; } ?>">
            </div>
            <div>
                <label for="lieu">Adresse :</label><input type="text" name="lieu" id="lieu"  required placeholder="Place de la Libération 21000 DIJON" value="<?php if(isset($lieu)){ echo $lieu; } ?>">
            </div>
            <div>
                <label for="prix">Prix minimum d'un menu <i>(en €)</i>  :</label><input type="number" name="prix" id="prix" required placeholder="10" value="<?php if(isset($prix)){ echo $prix; } ?>">
            </div>
            <div>
                <label for="nbrpers">Nombre de personnes :</label><input type="number" name="nbrpers" id="nbrpers" value="<?php if(isset($nbrpers)){ echo $nbrpers; } ?>">
            </div>
            <div>
                <label for="contact">Contact :</label><input type="text" name="contact" id="contact" placeholder="09.09.09.09.09" value="<?php if(isset($contact)){ echo $contact; } ?>">
            </div>
            <div>
                <label for="lien">Lien pour réserver :</label><input type="text" name="lien" id="lien" required value="<?php if(isset($lien)){ echo $lien; } ?>">
            </div>
            <div>
                <label for="file">Image <i>(renommez votre photo afin de ne pas avoir de caractères spéciaux)</i>:</label><input type="file" name="file" id="file" required>
            </div>
            <div>
                <label for="type">Catégorie :</label><select name="type" id="type">
                    <option value="fastfood">Fastfood</option>
                    <option value="pizzeria">Pizzeria</option>
                    <option value="resto">Restaurant</option>
                    <option value="brasserie">Brasserie</option>

                </select>
            </div>
            <div id="submit">
                <input type="submit" value="Envoyer" name="submit">
            </div>
        </form> 
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