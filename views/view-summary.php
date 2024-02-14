<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Synthèse d'inscription</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="../assets/style/summary.css">
</head>

<body>
    <div class="container">
        <h2 class="center-align">Synthèse d'inscription</h2>
        <div class="row">
            <div class="col s12">
                <p class="flow-text">Merci pour votre inscription !</p>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <ul class="collection with-header">
                    <li class="collection-header"><h4>Informations d'inscription</h4></li>
                    <li class="collection-item"><strong>Nom d'entreprise:</strong> <?php  echo "<p>Nom d'Entreprise : $enterprise_name</p>"; ?></li>
                    <li class="collection-item"><strong>Adressse mail:</strong> <?php echo "<p>Adresse email : $enterprise_email</p>"; ?></li>
                    <li class="collection-item"><strong>Numéro de siret:</strong> <?php echo "<p>Numéro siret : $enterprise_siret</p>"; ?></li>
                    <li class="collection-item"><strong>Adresse:</strong> <?php echo "<p>Adresse : $enterprise_adress</p>"; ?></li>
                    <li class="collection-item"><strong>Ville :</strong> <?php echo "<p>Ville : $enterprise_city</p>"; ?></li>
                    <li class="collection-item"><strong>Zipcode:</strong> <?php echo "<p>Code postal: $enterprise_zipcode</p>"; ?></li>
                </ul>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <p>Un email de confirmation a été envoyé à <?php echo $enterprise_email; ?>.</p>
            </div>
        </div>
        <div class="row">
            <div class="col s12 center-align">
                <a href="../controllers/controller-signin.php" class="waves-effect waves-light btn"><i class="material-icons left">login</i>Se connecter</a>
            </div>
        </div>
    </div>

    <!-- Materialize JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
