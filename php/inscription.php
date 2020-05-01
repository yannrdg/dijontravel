<?php

    $nom = htmlspecialchars($_POST['nom']);
    $prenom = htmlspecialchars($_POST['prenom']);
    $email = htmlspecialchars($_POST['email']);
    $email2 = htmlspecialchars($_POST['email2']);
    $mdp = $_POST['mdp'];
    $mdp2 = $_POST['mdp2'];

try
{
    include 'config.php';

    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    
    if(isset($_POST['valider']))
        {
        
    
    
        if(!empty($_POST['nom']) AND !empty($_POST['prenom']) AND !empty($_POST['email']) AND !empty($_POST['email2']) AND !empty($_POST['mdp']) AND !empty($_POST['mdp2']) )
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
                            $ajoutlogin = $bdd->prepare("INSERT INTO visiter (login) SELECT login FROM visiteur");
                            $ajoutlogin->execute(array($login));
                            $erreur = "Votre inscription a bien été pris en compte";
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
          $erreur = "Tous les champs doivent être complétés";
        }
    }
    
} catch(PPDOException $Exception)
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
    <title>Fomulaire</title>
</head>

<body>
<header>
        <div>
        <a href="../index.php">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo principal"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
            <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
        <a href="deconnexion.php" class="co">Déconnexion</a>
        <a href="profil.php" class="img"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
                        alt="profil"></a>
        <?php 
        }
        else 
        {
        ?>
            <a href="connexion.php" class="co">Connexion</a>
            <a href="inscription.php" class="co">Inscrivez-vous</a>
        <?php 
        }
        ?> 
            </div>     
        </div>
    </header>
    <main>
        <h1>Fomulaire d'inscription</h1>
   <form action="" method="POST">
   <div>
            <div>
                <div>
                    <p>Nom</p>
                    <input type="text" name="nom" id="nom" name="nom" required autofocus placeholder="Nom">
                </div>
                <div>
                    <p>Prénom</p>
                    <input type="text" name="prenom" id="prenom" name="prenom" required placeholder="Prénom">
                </div>
            </div>
            <div>
                <div>
                    <p>Adresse mail</p>
                    <input type="email" name="email" id="email" name="email" required placeholder="Adresse mail">
                </div>
            </div>
            <div>
                <div>
                    <p>Confirmer mon adresse mail</p>
                    <input type="email" name="email2" id="email2" name="email2" required placeholder="Adresse mail">
                </div>
            </div>
            <div>
                <div>
                    <p>Mot de passe</p>
                    <input type="password" name="mdp" id="mdp" name="mdp" required placeholder="Mot de passe">
                </div>
                <div>
                    <p>Confirmez votre mot de passe</p>
                    <input type="password" name="mdp2" id="mdp2" name="mdp2" required placeholder="Confirmez votre mot de passe">
                </div>
            </div>
            <div>
                <input type="checkbox" name="conditions" id="conditions" required><label for="conditions">Acceptez les
                    conditions d'utilisations.</label>
            </div>
            <div>
                <input type="submit" name="valider" id="valider">
            </div>
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
            <a href="">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="">Nous contacter</a>
        </div>

    </footer>
</body>

</html>