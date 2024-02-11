<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <title>Page de connexion</title>
    <style>
        .body {
            background: rgb(76, 157, 255);
           
        }

        .center-card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
        }
    </style>
</head>

<body class="body">

    <div class="container center-card">
        <div class="row">
            <div class="col s12 m6 offset-m3">
                <div class="card">
                    <div class="card-content">
                        <span class="card-title center-align">Connexion</span>

                        <form action="controller-signin.php" method="POST">

                            <!-- Champ Email -->
                            <div class="input-field">
                                <i class="material-icons prefix">email</i>
                                <input type="email" id="mail" name="enterprise_email" class="validate">
                                <label for="mail">Email :</label>
                                <?php
                                // Vérifie si l'email a été soumis et s'il est vide
                                if (isset($_POST['enterprise_email']) && empty($_POST["enterprise_email"])) {
                                    echo '<span class="helper-text red-text">Champ obligatoire</span>';
                                }
                                ?>
                            </div>

                            <!-- Champ Mot de passe -->
                            <div class="input-field">
                                <i class="material-icons prefix">lock</i>
                                <input type="password" id="password" name="enterprise_password" class="validate">
                                <label for="password">Mot de passe :</label>
                                <?php
                                // Vérifie si le mot de passe a été soumis et s'il est vide
                                if (isset($_POST['enterprise_password']) && empty($_POST["enterprise_password"])) {
                                    echo '<span class="helper-text red-text">Champ obligatoire</span>';
                                }
                                ?>
                            </div>

                            <!-- Affichage des erreurs de connexion -->
                            <p class="red-text"><?= isset($errors["connexion"]) ? $errors["connexion"] : "" ?></p>

                            <!-- Bouton de soumission -->
                            <div class="center-align">
                                <button class="btn waves-effect waves-light" type="submit">Se connecter
                                    <i class="material-icons right">send</i>
                                </button>
                            </div>

                            <div class="center-align">
                                <p class="grey-text text-darken-2">Pas encore inscrit ? <a href="../controllers/controller-signup.php">S'inscrire</a></p>
                            </div>

                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
    <script>
        M.AutoInit();
    </script>

</body>

</html>