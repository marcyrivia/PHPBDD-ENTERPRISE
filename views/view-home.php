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
            padding-top: 50px; /* Ajout de marge pour le contenu sous la barre de navigation */
        }

        .nav-wrapper {
            background-color: #263238;
            padding-left: 10px; /* Ajustement de la marge interne */
            padding-right: 10px; /* Ajustement de la marge interne */
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

        /* Style pour rendre l'image centrée et responsive */
        .user-image {
            display: block;
            margin: 0 auto; /* Centre l'image horizontalement */
            width: 150px; /* Taille de l'image */
            height: 150px; /* Taille de l'image */
            object-fit: cover; /* Assure que l'image est coupée pour tenir dans le conteneur */
            border-radius: 50%; /* Rendre l'image circulaire */
        }
        
        /* Style pour positionner le pseudo au-dessus de l'image */
        .user-pseudo {
            text-align: center;
            margin-top: 10px;
            font-size: 1.2rem;
        }
        
        /* Ajout de marges et de paddings pour les cartes */
        .card-content {
            padding-top: 20px;
        }
        
        .card-action {
            padding-top: 0;
            text-align: center;
        }
    </style>
</head>

<body>

    <nav>
        <div class="nav-wrapper blue darken-2">
            <a href="#" class="brand-logo center">Tableau de Bord</a>
            <a href="#" data-target="slide-out" class="sidenav-trigger"><i class="material-icons">menu</i></a>
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
                        <div class="row">
                            <div class="col s12">
                                <p class="user-pseudo"><?= $user['user_pseudo'] ?></p>
                            </div>
                            <div class="col s12">
                                <img class="user-image" src="http://PHPBDD.test/assets/img/<?= $user['user_photo']; ?>" alt="Photo de profil">
                            </div>
                        </div>
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
                        <span class="card-title">5 derniers trajets</span>
                        <?php foreach (Entreprise::lastFiveTrajets($_SESSION['enterprise']['enterprise_id']) as $ride): ?>
                        <div class="row">
                            <div class="col s12">
                                <p class="user_pseudo"><?= $ride['user_pseudo'] ?></p>
                                <p class="ride_date"><?= $ride['ride_date'] ?></p>
                                <p class="ride_distance"><?= $ride['ride_distance'] ?>km</p>
                            </div>
                        </div>
                        <?php endforeach; ?>
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
