<?php
session_start();
if(isset($_SESSION['email']))
{
	header ('Location: ../index.php');
}
$nom = htmlspecialchars($_POST['nom']);
$prenom = htmlspecialchars($_POST['prenom']);
$email = htmlspecialchars($_POST['email']);
$email2 = htmlspecialchars($_POST['email2']);
$mdp = $_POST['mdp'];
$mdp2 = $_POST['mdp2'];
$url="connexion.php";
    $texte_du_lien="connexion";

include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
$bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

try
{
    if(isset($_POST['valider']))
    {
    


        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) )
        {   
            $reqtitre = $bdd->prepare("SELECT * FROM visiteur WHERE email = ?");
            $reqtitre->execute(array($email));
            $emailexist = $reqtitre->rowCount();
            if($emailexist == 0)
            {
    
                if($email == $email2)
                {
                    if(filter_var($email, FILTER_VALIDATE_EMAIL))
                    {   
                        $mdplength = strlen($mdp);
                        if($mdplength <= 50)
                        {
                                if($mdp == $mdp2)
                            {
                            $sth = $bdd->prepare("INSERT INTO visiteur(nom, prenom, email, mdp) VALUES (:nom, :prenom, :email, :mdp)");  
                            $sth->bindParam(':nom',$nom);
                            $sth->bindParam(':prenom',$prenom);
                            $sth->bindParam(':email',$email);
                            $sth->bindParam(':mdp',$mdp);
                            $sth->execute();
                            header('Location: connexion.php');
                            }
                            else 
                            {
                                $erreur = "Vos mots de passe ne correspondent pas";
                            }
                        }
                        else
                        {
                            $erreur = "Votre mot de passe doit faire moins de 50 caractères";
                        }
                    }
                    else 
                    {
                        $erreur = "Votre adresse mail n'est pas valide";
                    }
                }
                else 
                {
                    $erreur = "Vos mails ne correpondent pas";
                }
            }
            else
            {
                $erreur = "Vous possédez déjà un compte";
            } 
        }
        else 
        {
        $erreur = "Tous les champs doivent être complétés";
        }
    }

} 
catch(PPDOException $Exception)
{
    echo 'Impossible de traiter les données. Erreur : '.$Exception->getMessage();
}

?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/inscription.css">
    <link rel="stylesheet" href="../style/global.css">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Fomulaire d'inscription</title>
</head>

<body>
<?php
include ('../includes/header.php');
?>
    <main>
        <h1>Inscription</h1>
        <form action="" method="POST">
            <div>
                <div>
                    <label for="nom">Nom</label>
                    <input type="text" name="nom" id="nom" name="nom" placeholder="DUPONT" value="<?php if(isset($nom)){ echo $nom; } ?>">
                </div>
                <div>
                    <label for="prenom">Prénom</label>
                    <input type="text" name="prenom" id="prenom" name="prenom" placeholder="Jean" value="<?php if(isset($prenom)){ echo $prenom; } ?>">
                </div>
            </div>
            <div>
                <div>
                    <label for="email">Adresse mail</label>
                    <input type="email" name="email" id="email" name="email" placeholder="dupontjean@gmail.com" value="<?php if(isset($email)){ echo $email; } ?>">
                </div>
            </div>
            <div>
                <div>
                    <label for="email2">Confirmez votre adresse mail</label>
                    <input type="email" name="email2" id="email2" name="email2" placeholder="dupontjean@gmail.com">
                </div>
            </div>
            <div>
                <div>
                    <label for="mdp">Mot de passe</label>
                    <input type="password" name="mdp" id="mdp" name="mdp" placeholder="**********">
                </div>
                <div>
                    <label for="mdp2">Confirmez votre mot de passe</label>
                    <input type="password" name="mdp2" id="mdp2" name="mdp2" 
                        placeholder="**********">
                </div>
            </div>
            <div>
                <input type="checkbox" name="conditions" id="conditions" ><label for="conditions">Acceptez
                    les
                    conditions d'utilisations.</label>
            </div>
            <div>
                <input type="submit" name="valider" id="valider" value="ENVOYER">
            </div>
    <p>
    <?php
        if(isset($erreur))
        {
            echo $erreur;
        }
    ?>
    </p>
    </form>
    </main>
<?php
include ('../includes/footer.php');
?>
 
</body>

</html>
