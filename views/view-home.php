<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <title>Tableau de Bord</title>
    <!-- Materialize CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
    <style>
        body {
            background-color: #f4f4f4;
        }

        .nav-wrapper {
            background-color: #263238;
        }

        .nav-wrapper ul li a {
            color: #fff;
        }

        .side-nav {
            width: 16rem;
            background-color: #263238;
            color: #fff;
            padding-top: 20px;
        }

        .side-nav li a {
            color: #fff;
            padding: 16px 20px;
            display: block;
        }

        h4 {
            color: #37474f;
        }

        .card {
            margin-bottom: 20px;
        }

        .card .card-content {
            padding: 24px;
        }

        .card .card-title {
            color: #fff;
            font-size: 1.5rem;
            font-weight: bold;
        }

        .card .card-action a {
            color: #fff;
            font-weight: bold;
        }
    </style>
</head>

<body>

    <nav>
        <div class="nav-wrapper">
            <a href="#" class="brand-logo center">Tableau de Bord</a>
            <ul id="nav-mobile" class="right hide-on-med-and-down">
                <li><a href="#">Lien 1</a></li>
                <li><a href="#">Lien 2</a></li>
                <li><a href="#">Lien 3</a></li>
            </ul>
        </div>
    </nav>

    <ul id="slide-out" class="sidenav sidenav-fixed">
        <li class="center-align">Coordonnées de l'entreprise :</li>
        <li>Nom : <?= $_SESSION['enterprise']['enterprise_name'] ?></li>
        <li>Email : <?= $_SESSION['enterprise']['enterprise_email'] ?></li>
        <li>Siret : <?= $_SESSION['enterprise']['enterprise_siret'] ?></li>
        <li>Adresse : <?= $_SESSION['enterprise']['enterprise_adress'] ?></li>
        <li>Code postal : <?= $_SESSION['enterprise']['enterprise_zipcode'] ?></li>
        <li>Ville : <?= $_SESSION['enterprise']['enterprise_city'] ?></li>
        <li><a href="../controllers/controller-deconnect.php"> Déconnexion </a></li>
    </ul>

    <div class="container">
        <h4 class="center-align">Bienvenue sur votre tableau de bord</h4>
        <div class="row">
            <div class="col s12 m4">
                <div class="card blue darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Total des utilisateurs</span>
                        <p>Nombre d'utilisateurs : <?= Entreprise::countUsers($_SESSION['enterprise']['enterprise_id']) ?></p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text">Voir plus</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card deep-purple darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Total des utilisateurs actifs</span>
                        <p>Utilisateurs actifs : <?= Entreprise::countActifsUsers($_SESSION['enterprise']['enterprise_id']) ?></p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text">Détails</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m4">
                <div class="card purple darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Total des trajets</span>
                        <p>Total des trajets créés : <?= Entreprise::countTotalTrajets($_SESSION['enterprise']['enterprise_id']) ?></p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text">Détails</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6">
                <div class="card teal darken-1">
                    <div class="card-content white-text">
                        <span class="card-title">Les 5 derniers utilisateurs</span>
                        <?php foreach (Entreprise::lastFiveUsers($_SESSION['enterprise']['enterprise_id']) as $user): ?>
                        <p> <?= $user['user_pseudo'] ?> </p>
                        <img src="http://PHPBDD.test/assets/img/<?= $user['user_photo']; ?>" alt="Photo de profil">
                        <?php endforeach; ?>
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text">Détails</a>
                    </div>
                </div>
            </div>
            <div class="col s12 m6">
                <div class="card brown">
                    <div class="card-content white-text">
                        <span class="card-title">Stats Hebdo (à venir)</span>
                        <p>À venir...</p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text">Détails</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col s12">
                <div class="card light-blue darken-4">
                    <div class="card-content white-text">
                        <span class="card-title">Total des trajets</span>
                        <p>Aperçu du total trajets...</p>
                    </div>
                    <div class="card-action">
                        <a href="#" class="white-text">Détails</a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Materialize JavaScript -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>
