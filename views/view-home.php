<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="../node_modules/materialize-css/dist/css/materialize.min.css">
    <style>
        body {
            background-color: #f5f5f5;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .navbar {
            background-color: #3949ab;
            color: #fff;
            padding: 20px;
            border-radius: 5px;
            margin-bottom: 20px;
        }
        .navbar h1 {
            margin: 0;
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 10px;
        }
        .navbar ul {
            list-style-type: none;
            padding: 0;
            margin: 0;
        }
        .navbar li {
            margin-bottom: 10px;
        }
        .navbar a {
            color: #fff;
            transition: color 0.3s;
        }
        .navbar a:hover {
            color: #ff0000;
        }
        .container {
            margin-top: 20px;
        }
        .card {
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
        }
        h2 {
            color: #3949ab;
            font-size: 24px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="navbar white-text">
            <h1><?php echo $enterprise_name ?></h1>
            <ul>
                <li><?php echo $date ?></li>
                <li><?php echo $enterprise_siret ?></li>
                <li><?php echo $enterprise_adress ?></li>
                <li><?php echo $enterprise_city ?></li>
                <li><?php echo $enterprise_zipcode ?></li>
                <li><?php echo $enterprise_email ?></li>
                <li><a href="../controllers/controller-deconnect.php">Déconnexion</a></li>
            </ul>
        </div>
        <div class="row">
            <div class="col s12">
                <h2>Tableau de bord</h2>
            </div>
        </div>
        <div class="row">
            <div class="col s12 m6 l3">
                <div class="card">Nombre d'utilisateurs: <?= $enterpriseCount  ?> </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">Utilisateurs actifs</div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">Nombre de trajets : <?= $trajetStr ?> </div>
            </div>
            <div class="col s12 m6 l3">
                <div class="card">Statistique hebdomadaire</div>
            </div>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>
</html>
