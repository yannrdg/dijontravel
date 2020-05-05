<?php
session_start();
if(isset($_SESSION['email']))
{
	header ('Location: ../index.php');
}
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
            $_SESSION['nom'] = $userinfo['nom'];
            $_SESSION['email'] = $userinfo['email'];
            header('Location: ../index.php');
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
    <link rel="stylesheet" href="../style/global.css">
    <link rel="stylesheet" href="../style/connexion.css">
    <link rel="icon" href="../medias/logooo.png" />
    <title>Connexion</title>
</head>
<?php
include ('../includes/header.php');
?>
<body>
    <p>
        <?php
            echo $erreurAjout;
        ?>
    </p>
    <main>
        <fieldset>
            <legend>Ravis de vous revoir !</legend>
            <form action="" method="POST">
                <div>
                    <label for="emailconnect">Adresse email</label>
                    <input type="email" id="emailconnect" name="emailconnect" placeholder="Adresse email"
                        value="<?php if(isset($emailconnnect)){ echo $emailconnnect; } ?>">
                </div>
                <div>
                    <label for="mdpconnect">Mot de passe</label>
                    <input type="password" id="mdpconnect" name="mdpconnect" placeholder="Mot de passe">
                </div>
                <div id="submit">
                    <input type="submit" value="S'identifier" name="formconnect">
                </div>
                <p><?php
                if(isset($erreur))
                {
                    echo $erreur;
                }
                ?></p>
            </form>
        </fieldset>
        <section>
            <h4>Nouveau sur Dij’On Travel ?</h4>
            <a href="inscription.php">Inscrivez-vous dès maintenant !</a>
        </section>
    </main>
<?php
include ('../includes/footer.php');
?>
</body>

</html>
