<?php
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

if(isset($_POST['formconnect']))
{
    $emailconnnect = htmlspecialchars($_POST['emailconnect']);
    $mdpconnnect = $_POST['mdpconnect'];
    if(!empty($emailconnnect) AND !empty($mdpconnnect))
    {
        $requser = $bdd->prepare("SELECT * FROM visiteur WHERE mdp = ? AND email = ?");
        $requser->execute(array($mdpconnnect, $emailconnnect));
        $userexist = $requser->rowCount();
        if($userexist == 1)
        {
            $userinfo = $requser->fetch();
            $_SESSION['prenom'] = $userinfo['prenom'];
            $_SESSION['email'] = $userinfo['email'];
            $erreur = "ok";
        }
        else 
        {
            $erreur = "Mauvais identifiants";
        }
    } 
    else 
    {
        $erreur = "Tout les champs doivent être complétés";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="yann" content="autho">
    <link rel="stylesheet" href="../style/connexion.css">
    <title>Connexion</title>
</head>

<body>
    <main>
        <section>
            <h1>S'identifier</h1>

            <form action="" method="POST">
                <div>
                    <label for="emailconnect">Votre e-mail</label>
                    <input type="email" id="emailconnect" name="emailconnect">
                </div>
                <div>
                    <label for="mdpconnect">Votre mot de passe</label>
                    <input type="password" id="mdpconnect" name="mdpconnect">
                </div>
                <div id="submit">
                    <input type="submit" value="Connexion" name="formconnect">
                </div>
                <p><?php
                if(isset($erreur))
                {
                    echo $erreur;
                }
                ?></p>
            </form>
            <a href="inscription.php">Première connexion</a>
        </section>
        <a href="../index.php">Accueil</a>
    </main>
</body>

</html>
