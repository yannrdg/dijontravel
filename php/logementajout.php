<?php
session_start();
include 'config.php';
//On se connecte à la BDD
$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
if(isset($_SESSION['email']))
{
    $titre = $_POST['titre'];
    $lieu = $_POST['lieu'];
    $prix = $_POST['prix'];
    $nbrpers = $_POST['nbrpers'];
    $lien = $_POST['lien'];
    $contact = $_POST['contact'];
    $type = $_POST['type'];
    $email3 = $_SESSION['email'];
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
        if(!empty($_POST['titre']) AND !empty($_POST['lieu']) AND !empty($_POST['prix']) AND !empty($_POST['nbrpers']) AND !empty($_POST['lien']) AND !empty($_POST['type']))
        {
            $reqtitre = $bdd->prepare("SELECT * FROM Logement WHERE titre = ?");
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
                                        INSERT INTO Logement(titre, lieu, prix, nbrpers, lien, contact, type, email, file)
                                        VALUES(:titre, :lieu, :prix, :nbrpers, :lien, :contact, :type, :email, '$fileName')");  
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
                                    $erreur2 = 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../style/formulaireajout.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Offre logement</title>
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
        <h1>Ajoutez une offre pour un logement</h1>

        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="titre">Titre :</label><input type="text" name="titre" id="titre" required value="<?php if(isset($titre)){ echo $titre; } ?>">
            </div>
            <div>
                <label for="lieu">Adresse :</label><input type="text" name="lieu" id="lieu" required placeholder="Place de la Libération 21000 DIJON" value="<?php if(isset($lieu)){ echo $lieu;} ?>">
            </div>
            <div>
                <label for="prix">Prix minimum par pers/nuit <i>(en €)</i> :</label><input type="number" name="prix" id="prix" required placeholder="10" value="<?php if(isset($prix)){ echo $prix; } ?>">
            </div>
            <div>
                <label for="nbrpers">Nombre de personnes :</label><input type="number" name="nbrpers" id="nbrpers" required value="<?php if(isset($nbrpers)){ echo $nbrpers; } ?>">
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
                <label for="type">*Catégorie :</label><select name="type" id="type">
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