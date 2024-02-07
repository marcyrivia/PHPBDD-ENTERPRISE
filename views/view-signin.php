<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>


    <h2>Log in</h2>

    <!-- Formulaire de connexion -->
    <form action="controller-signin.php" method="POST" novalidate>

        <!-- Champ enterprise_name -->
        <label for="enterprise_email">enterprise_email:
            <?php
            // Vérifie si le enterprise_name a été soumis et s'il est vide
            if (isset($_POST['enterprise_email']) && empty($_POST["enterprise_email"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
            }
            ?>
        </label><br>
        <input type="text" id="enterprise_email" name="enterprise_email" value="<?php echo htmlspecialchars($enterprise_email ?? ''); ?>">
        </span><br><br>

        <!-- Champ Mot de passe -->
        <label for="enterprise_password">Mot de passe:
            <?php
            // Vérifie si le enterprise_name a été soumis et s'il est vide
            if (isset($_POST['enterprise_email']) && empty($_POST["enterprise_password"])) {
                echo '<span style="color: red;">Champs obligatoire.</span>';
            }
            ?>
        </label><br>
        <input type="password" id="enterprise_password" name="enterprise_password" value="">
        </span><br><br>

        <!-- Affichage des erreurs de connexion -->
        <p><?= $errors["connexion"] ?? "" ?></p>

        <!-- Bouton de soumission -->
        <input type="submit" value="Se connecter">
    </form>
    <div class="popo">
    <p class="signp">Créer un compte ? </p>
<a href="../controllers/controller-signup.php"><input class="signin" type="submit" value="Créer un compte"> </input></a>
</div>
    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>

</body>

</html>
`
