<?php

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
<header>
        <div>
        <a href="../index.php">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
            <a href="connexion.php" class="co">Connexion</a>
            </div>     
        </div>
    </header>
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
    <footer>
    <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/contact/">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="https://iutdijon.u-bourgogne.fr/mmicmstp/MMI2019/wp15/contact/">Nous contacter</a>
        </div>
        <div>
            <a href="https://fr-fr.facebook.com/VilledeDijon/"><svg width="4vw" height="6vh" aria-hidden="true" focusable="false" data-prefix="fab"
                    data-icon="facebook-square" class="svg-inline--fa fa-facebook-square fa-w-14" role="img"
                    xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
                    <path fill="currentColor"
                        d="M400 32H48A48 48 0 0 0 0 80v352a48 48 0 0 0 48 48h137.25V327.69h-63V256h63v-54.64c0-62.15 37-96.48 93.67-96.48 27.14 0 55.52 4.84 55.52 4.84v61h-31.27c-30.81 0-40.42 19.12-40.42 38.73V256h68.78l-11 71.69h-57.78V480H400a48 48 0 0 0 48-48V80a48 48 0 0 0-48-48z">
                    </path>
                </svg></a>
            <a href="https://www.instagram.com/villededijon/"> <svg width="4vw" height="6vh" aria-hidden="true" focusable="false" data-prefix="fab"
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