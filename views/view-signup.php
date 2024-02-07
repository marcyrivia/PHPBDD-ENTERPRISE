<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscrivez-vous</title>
</head>

<body>

    <!-- Header -->
    <header>
        <!-- Votre code pour l'en-tête -->
    </header>

    <h2>Inscription</h2>

    <form action="controller-signup.php" method="POST" novalidate>
        <label for="enterprise_name">Nom de votre entreprise:</label><br>
        <input type="text" id="enterprise_name" name="enterprise_name" value="<?= isset($_POST['enterprise_name']) ? htmlspecialchars($_POST['enterprise_name']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_name'])) {
                echo $errors['enterprise_name'];
            } ?>
        </span><br><br>

        <label for="siret">numéro de siret:</label><br>
        <input type="text" id="siret" name="enterprise_siret" value="<?= isset($_POST['enterprise_siret']) ? htmlspecialchars($_POST['enterprise_siret']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_siret'])) {
                echo $errors['enterprise_siret'];
            } ?>
        </span><br><br>

        <label for="adresse">Adresse de votre entreprise:</label><br>
        <input type="text" id="adresse" name="enterprise_adresse" value="<?= isset($_POST['enterprise_adresse']) ? htmlspecialchars($_POST['enterprise_adresse']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_adresse'])) {
                echo $errors['enterprise_adresse'];
            } ?>
        </span><br><br>

        <label for="city">Ville:</label><br>
        <input type="text" id="city" name="enterprise_city" value="<?= isset($_POST['enterprise_city']) ? htmlspecialchars($_POST['enterprise_city']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_city'])) {
                echo $errors['enterprise_city'];
            } ?>
        </span><br><br>


        <label for="zipcode">Code Postal:</label><br>
        <input type="number" id="zipcode" name="enterprise_zipcode" value="<?= isset($_POST['enterprise_zipcode']) ? htmlspecialchars($_POST['enterprise_zipcode']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_zipcode'])) {
                echo $errors['enterprise_zipcode'];
            } ?>
        </span><br><br>

        <label for="email">E-mail:</label><br>
        <input type="email" id="email" name="enterprise_email" value="<?= isset($_POST['enterprise_email']) ? htmlspecialchars($_POST['enterprise_email']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_email'])) {
                echo $errors['enterprise_email'];
            } ?>
        </span><br><br>


        <label for="password">Mot de passe:</label><br>
        <input type="password" id="password" name="enterprise_password" value="<?= isset($_POST['enterprise_password']) ? htmlspecialchars($_POST['enterprise_password']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['enterprise_password'])) {
                echo $errors['enterprise_password'];
            } ?>
        </span><br><br>

        <label for="confirm_password">Confirmer le mot de passe:</label><br>
        <input type="password" id="confirm_password" name="confirm_password" value="<?= isset($_POST['confirm_password']) ? htmlspecialchars($_POST['confirm_password']) : '' ?>">
        <span class="error">
            <?php if (isset($errors['confirm_password'])) {
                echo $errors['confirm_password'];
            } ?>
        </span><br><br>

        <p class="cguP">Veuillez accepter les CGU</p>
        <label for="CGU"></label><br>
        <input type="checkbox" id="CGU" name="CGU" <?= isset($_POST['CGU']) ? "checked"  : '' ?>>
        <span class="error">
            <?php if (isset($errors['CGU'])) {
                echo $errors['CGU'];
            } ?>
        </span><br><br>

        <input type="submit" value="S'enregistrer">

    </form>
    <div class="popo">
        <p class="signp">Vous avez déjà un compte ? </p>
        <a href="../controllers/controller-signin.php"><input class="signin" type="submit" value="Se connecter"> </input></a>
    </div>
    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>




</body>

</html>