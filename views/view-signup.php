<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inscription</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/style/style.css">
    <style>
        body {
            background: rgb(76, 157, 255);
        }

        .container {
            max-width: 600px;
        }

        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .card-title {
            color: #333;
        }

        .btn {
            background-color: #26a69a;
        }

        .btn:hover {
            background-color: #2bbbad;
        }
    </style>
</head>

<body>

    <!-- Header -->
    <header>
        <!-- Votre code pour l'en-tête -->
    </header>

    <div class="container">
        <div class="card">
            <div class=" col s5 offset-s3">
                <h2 class="card-title center-align">Inscription</h2>

                <form class="col s12" action="controller-signup.php" method="POST" novalidate>
                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="enterprise_name" type="text" name="enterprise_name" class="validate" value="<?= isset($_POST['enterprise_name']) ? htmlspecialchars($_POST['enterprise_name']) : '' ?>">
                            <label for="enterprise_name">Nom de l'entreprise :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_name']) ? $errors['enterprise_name'] : '' ?>
                            </span>
                        </div>

                        <div class="input-field col s12 m6">
                            <input id="enterprise_siret" type="text" name="enterprise_siret" class="validate" value="<?= isset($_POST['enterprise_siret']) ? htmlspecialchars($_POST['enterprise_siret']) : '' ?>">
                            <label for="enterprise_siret">SIRET :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_siret']) ? $errors['enterprise_siret'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="enterprise_adress" type="text" name="enterprise_adress" class="validate" value="<?= isset($_POST['enterprise_adress']) ? htmlspecialchars($_POST['enterprise_adress']) : '' ?>">
                            <label for="enterprise_adress">Adresse :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_adress']) ? $errors['enterprise_adress'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="enterprise_city" type="text" name="enterprise_city" class="validate" value="<?= isset($_POST['enterprise_city']) ? htmlspecialchars($_POST['enterprise_city']) : '' ?>">
                            <label for="enterprise_city">Ville :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_city']) ? $errors['enterprise_city'] : '' ?>
                            </span>
                        </div>

                        <div class="input-field col s12 m6">
                            <input id="enterprise_zipcode" type="number" name="enterprise_zipcode" class="validate" value="<?= isset($_POST['enterprise_zipcode']) ? htmlspecialchars($_POST['enterprise_zipcode']) : '' ?>">
                            <label for="enterprise_zipcode">Code postal :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_zipcode']) ? $errors['enterprise_zipcode'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <input id="enterprise_email" type="email" name="enterprise_email" class="validate" value="<?= isset($_POST['enterprise_email']) ? htmlspecialchars($_POST['enterprise_email']) : '' ?>">
                            <label for="enterprise_email">E-mail :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_email']) ? $errors['enterprise_email'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12 m6">
                            <input id="enterprise_password" type="password" name="enterprise_password" class="validate">
                            <label for="enterprise_password">Mot de passe :</label>
                            <span class="red-text">
                                <?= isset($errors['enterprise_password']) ? $errors['enterprise_password'] : '' ?>
                            </span>
                        </div>

                        <div class="input-field col s12 m6">
                            <input id="confirm_password" type="password" name="confirm_password" class="validate">
                            <label for="confirm_password">Confirmer le mot de passe :</label>
                            <span class="red-text">
                                <?= isset($errors['confirm_password']) ? $errors['confirm_password'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <label>
                                <input type="checkbox" id="CGU" name="CGU" <?= isset($_POST['CGU']) ? "checked" : '' ?>>
                                <span>Veuillez accepter les CGU</span>
                            </label>
                            <span class="red-text">
                                <?= isset($errors['CGU']) ? $errors['CGU'] : '' ?>
                            </span>
                        </div>
                    </div>

                    <div class="row">
                        <div class="input-field col s12">
                            <button class="btn waves-effect waves-light" type="submit">S'enregistrer</button>
                            <a href="../controllers/controller-signin.php" class="btn waves-effect waves-light">Se connecter</a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <!-- Footer -->
    <footer>
        <!-- Votre code pour le pied de page -->
    </footer>

</body>

</html>
