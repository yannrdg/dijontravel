
<?php
session_start();
include 'config.php';

$bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);

if(isset($_SESSION['prenom']))
{
?>

<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="../style/pageprofil.css">
    <link rel="stylesheet" href="../style/global.css">
    <title>Page de profil</title>
</head>

<body>
    <header>
        <div>
            <a href="../index.html">
                <img src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Flogooo.png?v=1575622630122"
                    alt="logo princiapl"></a>
            <h1>DIJ'ON TRAVEL</h1>
            <div>
                <a href="formulaire.html">Inscrivez-vous</a>
                <a href="pageprofil.html"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fprofil.png?v=1575622638108"
                        alt="profil"></a>
            </div>
        </div>
    </header>
    <h1>Profil</h1>
    <main>
        <div><img
                src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2F4fffb355-1001-44d8-adde-f39fe0f57110.image.png?v=1578765605816"
                alt="page profil"></div>
        <div>
            <p>Nom/Prénom</p>
            <p><strong><?php echo $_SESSION["nom"] . $_SESSION["prenom"];?></strong></p>
        </div>
        <div><input type="button" value="Modifier"></div>
        <div><img
                src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2F3f1b1cad-4623-4c10-89d8-bb7fe2389449.image.png?v=1578765611890"
                alt="maison"></div>

        <div><input type="button" value="Modifier"></div>
        <div><img
                src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fa5b38009-0b42-4bc4-8749-ab0e36c345ac.image.png?v=1578765576218"
                alt="arobase"></div>
        <div>
            <p>Votre adresse mail</p>
            <p><strong><?php echo $_SESSION["email"]; ?></strong></p>
        </div>
        <div><input type="button" value="Modifier votre adresse mail"></div>
        <div><img
                src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2Fc19b4269-b6a8-4b1b-b14a-2833f1eb7bb1.image.png?v=1578765617606"
                alt="cadenas"></div>
        <div>
            <p>Votre mot de passe</p>
            <p><strong><?php echo $_SESSION["mdp"]; ?></strong></p>
        </div>
        <div><input type="button" value="Modifier votre mot de passe"></div>
    </main>
    <footer>
        <a href=""></a>
        <div>
            <p>Nous contacter</p>
        </div>
        <div>
            <p>Aide</p>
        </div>
        <div>
            <p>Réseaux sociaux</p>
            <p><a href="https://twitter.com/"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2FTwitterlogo.png?v=1575622650353"
                        alt="Twitter"></a><a href="https://www.snapchat.com/"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2FSnapchatlogo.png?v=1575622642844"
                        alt="Snapchat"></a><a href="https://www.instagram.com/"><img
                        src="https://cdn.glitch.com/0e477c32-76f7-47e1-a071-2405796f3fa5%2FInstagramlogo.png?v=1575622619653"
                        alt="Instagram"></a></p>
        </div>
    </footer>
</body>

</html>

<?php
}
else
{
    ?><!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="yann" content="autho">
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
            <a href="formulaire.php">Première connexion</a>
        </section>
        <a href="../index.php">Accueil</a>
    </main>
</body>

</html>
    <?php
    include 'config.php';

    $bdd = new PDO("mysql:host=$hostname;dbname=$dbname", $username, $password);
    
    if(isset($_POST['formconnect']))
    {
        $emailconnnect = htmlspecialchars($_POST['emailconnect']);
        $mdpconnnect = $_POST['mdpconnect'];
        if(!empty($mailconnnect) AND !empty($mdpconnnect))
        {
            $requser = $bdd->prepare("SELECT * FROM visiteur WHERE email = ? AND mdp = ?");
            $requser->execute(array($emailconnnect, $mdpconnnect));
            $userexist = $requser->rowCount();
            if($userexist == 1)
            {
                $userinfo = $requser->fetch();
                $_SESSION['email'] = $userinfo['email'];
                $_SESSION['nom'] = $userinfo['nom'];
                $_SESSION['prenom'] = $userinfo['prenom'];
                header("Location: logement.php");
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
}    
?>
