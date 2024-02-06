<?php
// j'appelle ma config et mon utilisateur
require_once '../config/config.php';
require_once '../models/enterprise.php';
// Vérification des données postées depuis le formulaire

var_dump($_POST);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Vérification du nom
    if (empty($_POST["enterprise_name"])) {
        $errors['Nom'] = "Champs obligatoire.";
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\-]+$/", $_POST["enterprise_name"])) {
        $errors['enterprise_name'] = "Le nom est invalide.";
    }

    // Vérification du adresse
    $regexadresse = '/^[a-zA-Z_\-\d]+$/';
    if (empty($_POST["enterprise_siret"])) {
        $errors['enterprise_siret'] = "Champs obligatoire.";
    } else if (!preg_match($regexsiret = '/^[a-zA-Z_\-\d ]+$/', $_POST["enterprise_siret"])) {
        $errors['enterprise_siret'] = "Le numéro de siret est invalide.";
    } else if (strlen($_POST["enterprise_siret"]) !== 14) {
        $errors['enterprise_siret'] = "Le numéro de siret doit comporter 14 caractères.";
    }



    // Vérification du adresse
    $regexadresse = '/^[a-zA-Z_\-\d ]+$/';
    if (empty($_POST["enterprise_adresse"])) {
        $errors['adreenterprise_adresse'] = "Champs obligatoire.";
    }

    // Vérification du adresse
    $regexcity = '/^[a-zA-Z_\-\d ]+$/';
    if (empty($_POST["enterprise_city"])) {
        $errors['enterprise_city'] = "Champs obligatoire.";
    }

    // Vérification du adresse
    if (empty($_POST["enterprise_zipcode"])) {
        $errors['enterprise_zipcode'] = "Champs obligatoire.";
    }


    // Vérification de l'email
    if (empty($_POST["enterprise_email"])) {
        $errors['enterprise_email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["enterprise_email"], FILTER_VALIDATE_EMAIL)) {
        $errors['enterprise_email'] = "L'adresse email est invalide.";
    }

    // Vérification du mot de passe
    $password = $_POST["enterprise_password"];
    $confirm_password = $_POST["confirm_password"];
    if (empty($password) || strlen($password) < 8 || $password !== $confirm_password) {
        $errors['enterprise_password'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }

    if (!isset($_POST["CGU"])) {
        $errors['CGU'] = "Les CGU sont obligatoires";
    }

    // Affichage des erreurs
    // Si aucune erreur détectée
    var_dump($errors);


        // Afficher la synthèse des informations et le message de confirmation
        if (empty($errors)) {
            // Instance d'une PDO 
            try {
                $name_enterprise = $_POST['enterprise_name'];
                $siret = $_POST['enterprise_siret'];
                $adresse = $_POST['enterprise_adresse'];
                $city = $_POST['enterprise_city'];
                $zipcode = $_POST['enterprise_zipcode'];
                $email = $_POST['enterprise_email'];
                $password = $_POST['enterprise_password'];

                var_dump($_POST);
                Enterprise::create($name_enterprise,  $siret,   $adresse,  $city,  $zipcode,  $email,  $password);
            } catch (PDOException $e) {
                echo "Erreur : " . $e->getMessage();
                die();
            }
            include('../views/view-summary.php');
            exit; // Arrêter l'exécution du script
        }
?>
<?php

}
// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('../views/view-signup.php');
?>