<header>
    <div>
        <a href="../index.php">
            <img src="../medias/logooo.png"
                alt="logo principal"></a>
        <h1>DIJ'ON TRAVEL</h1>
        <div>
            <?php
        if(isset($_SESSION['prenom']))
        {
        ?>
            <a href="deconnexion.php" class="co">Déconnexion</a>
            <a href="profil.php" class="img"><img
                    src="../medias/profil.png"
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


