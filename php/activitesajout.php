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
    $description = $_POST['description'];
    $site = $_POST['site'];
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
        if(!empty($_POST['titre']) AND !empty($_POST['lieu']) AND !empty($_POST['description']) AND !empty($_POST['site']) AND !empty($_POST['type']))
        {
            $reqtitre = $bdd->prepare("SELECT * FROM Activites WHERE titre = ?");
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

                                    if ($type === 'sport'){
                                        $categorie = "un";
                                    } elseif ($type === 'cult') {
                                        $categorie = "deux";
                                    } elseif ($type === 'festival') {
                                        $categorie = "trois";
                                    } elseif ($type === 'autre') {
                                        $categorie = "quatre";
                                    }
                                        
                
                                    //On insère les données reçues
                                    $sth = $bdd->prepare("
                                        INSERT INTO Activites (titre, lieu, description, site, type, email, file)
                                        VALUES(:titre, :lieu, :description, :site, :type, :email, '$fileName')");  
                                    $sth->bindParam(':titre',$titre);
                                    $sth->bindParam(':lieu',$lieu);
                                    $sth->bindParam(':description',$description);
                                    $sth->bindParam(':site',$site);
                                    $sth->bindParam(':type',$categorie);
                                    $sth->bindParam(':email',$email3);
                                    $sth->execute();
                                    
                                    //On renvoie l'utilisateur vers la page de remerciement
                                    header('Location: activites.php');
                
                
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
    <title>Offre activités</title>
</head>

<body>
<?php
include ('../includes/header.php');
?>
    <main>
        <h1>Ajoutez une offre pour une activité</h1>
        <form action="" method="POST" enctype="multipart/form-data">
            <div>
                <label for="titre">Titre :</label><input required type="text" name="titre" id="titre" value="<?php if(isset($titre)){ echo $titre; } ?>">
            </div>
            <div>
                <label for="lieu">Adresse :</label><input required type="text" name="lieu" id="lieu" placeholder="Place de la Libération 21000 DIJON" value="<?php if(isset($lieu)){ echo $lieu; } ?>">
            </div>
            <div>
                <label for="description">Description <i>(350 caractères maximum (espaces compris))</i> :</label><textarea required type="texte" maxlength="350" name="description" id="description"cols="55" rows="11" value="<?php if(isset($description)){ echo $description; } ?>"></textarea>
            </div>
            <div>
                <label for="site">Site web de l'activité :</label><input required type="texte" name="site" id="site" value="<?php if(isset($site)){ echo $site; } ?>">
            </div>
            <div>
                <label for="file">Image <i>(renommez votre photo afin de ne pas avoir de caractères spéciaux)</i>:</label><input required type="file" name="file" id="file">
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