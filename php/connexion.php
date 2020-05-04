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
    <footer>
        <div>
            <a href="">Qui sommes-nous ?</a>
        </div>
        <div>
            <a href="">Nous contacter</a>
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