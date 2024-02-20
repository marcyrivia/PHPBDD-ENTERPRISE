<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User List</title>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <link rel="stylesheet" href="../assets/css/userlist.css">
    <style>
        /* Ajout de styles CSS personnalisés */
        .card-image img {
            height: 200px;
            /* Hauteur fixe pour les images des cartes */
            object-fit: cover;
            /* Assure que l'image remplit entièrement le conteneur */
        }

        .company-info {
            background-color: #2196F3;
            /* Couleur de fond pour le div contenant les informations de l'entreprise */
            color: #fff;
            /* Couleur du texte */
            padding: 20px;
            /* Ajoute un peu de rembourrage */
            margin-bottom: 20px;
            /* Ajoute de l'espace en bas */
        }

        .company-info p {
            margin: 5px 0;
            /* Ajoute un peu d'espace autour des paragraphes */
        }

        .deconnect a {
            color: #fff;
        }

        .deconnect a:hover {
            color: red;
            /* Change la couleur du texte en rouge au survol */
        }

        /* Style des cartes */
        .card {
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            transition: box-shadow 0.3s ease-in-out;
        }

        .card:hover {
            box-shadow: 0 8px 16px rgba(0, 0, 0, 0.2);
        }

        /* Style des boutons */
        .btn {
            border: none;
            border-radius: 4px;
            cursor: pointer;
            padding: 10px 20px;
            transition: background-color 0.3s;
        }

        /* Style du bouton "Valider" */
        .btn-validate {
            background-color: #4CAF50;
            color: white;
            margin-right: 5px;
        }

        /* Style du bouton "Unvalidate" */
        .btn-unvalidate {
            background-color: #f44336;
            color: white;
        }

        /* Style des boutons au survol */
        .btn:hover {
            opacity: 0.8;
        }
    </style>
</head>

<body>

    <div class="company-info">
        <h4><?= $_SESSION['enterprise']['enterprise_name'] ?></h4>
        <p><strong>Email:</strong> <?= $_SESSION['enterprise']['enterprise_email'] ?></p>
        <p><strong>Siret:</strong> <?= $_SESSION['enterprise']['enterprise_siret'] ?></p>
        <p><strong>Adresse:</strong> <?= $_SESSION['enterprise']['enterprise_adress'] ?></p>
        <p><strong>Code postal:</strong> <?= $_SESSION['enterprise']['enterprise_zipcode'] ?></p>
        <p><strong>Ville:</strong> <?= $_SESSION['enterprise']['enterprise_city'] ?></p>
        <p class="deconnect"><a href="../controllers/controller-deconnect.php">Déconnexion</a></p>
    </div>

    <div class="container">
        <div class="row">
            <?php foreach (json_decode(Entreprise::allUsers($enterprise_id), true) as $user) : ?>
                <div class="col s12 m6 l4">
                    <div class="card hoverable">
                        <div class="card-image">
                            <img src="http://PHPBDD.test/assets/img/<?= $user['user_photo']; ?>" alt="Photo de profil">
                        </div>
                        <div class="card-content">
                            <span class="card-title grey-text text-darken-4"><?= $user['user_pseudo'] ?><i class="material-icons right">more_vert</i></span>
                            <div class="switch">
                                <label>
                                    Off
                                    <input name="swicth" type="checkbox" data-user-id="<?= $user["user_id"] ?>" <?= $user['user_validate'] == 1 ? "checked" : "" ?>>
                                    <span class="lever"></span>
                                    On
                                </label>
                            </div>
                        </div>
                        <div class="card-reveal">
                            <span class="card-title grey-text text-darken-4"><?= $user['user_pseudo'] ?><i class="material-icons right">close</i></span>
                            <p><strong>Prénom:</strong> <?= $user['user_firstname'] ?></p>
                            <p><strong>Nom:</strong> <?= $user['user_name'] ?></p>
                            <p><strong>Email:</strong> <?= $user['user_email'] ?></p>
                            <!-- Ajoutez d'autres informations sur l'utilisateur si nécessaire -->
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

    <script>
        document.addEventListener('click', e=>{
            if(e.target.type=='checkbox'){
                if(e.target.checked==false){
                    console.log("unvalidate")
                    fetch(`controller-ajax.php?unvalidate=${e.target.dataset.userId}`);
                } else {
                    console.log("validate")
                    fetch(`controller-ajax.php?validate=${e.target.dataset.userId}`);
                }

                // console.log(e.target.checked);
                // console.log(e.target.dataset.userId);
                // console.log(e.target.getAttribute('data-user-id'));
            }
        })
    </script>

</body>

</html>
