<?php
// j'appelle ma config et mon utilisateur
require_once '../config/config.php';
require_once "../models/enterprise.php";

session_start();

// Vérification des données postées depuis le formulaire
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errors = [];

    // Vérification du nom
    if (empty($_POST["enterprise_name"])) {
        $errors['enterprise_name'] = "Champs obligatoire.";
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\-\d ]+$/", $_POST["enterprise_name"])) {
        $errors['enterprise_name'] = "Le nom est invalide.";
    }

    // Vérification de l'adresse de l'entreprise
    if (empty($_POST["enterprise_adress"])) {
        $errors['enterprise_adress'] = "Champs obligatoire.";
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\-\d ]+$/", $_POST["enterprise_adress"])) {
        $errors['enterprise_adress'] = "L'adresse est invalide.";
    }


    // Vérification de l'email
    if (empty($_POST["enterprise_email"])) {
        $errors['enterprise_email'] = "Champs obligatoire.";
    } else if (!filter_var($_POST["enterprise_email"], FILTER_VALIDATE_EMAIL)) {
        $errors['enterprise_email'] = "L'adresse email est invalide.";
    }

    // Vérification du SIRET

    if (empty($_POST["enterprise_siret"])) {
        $errors['enterprise_siret'] = "Champs obligatoire.";
    } else if (!preg_match("/^[\d]+$/", $_POST["enterprise_siret"])) {
        $errors["enterprise_siret"] = "Le numéro SIRET est invalide";
    } else if (strlen($_POST["enterprise_siret"]) !== 14) {
        $errors["enterprise_siret"] = "Le numéro SIRET doit comporter 14 caractères.";
    }

    // Vérification du zipcode de l'entreprise

    if (empty($_POST["enterprise_zipcode"])) {
        $errors['enterprise_zipcode'] = "Champs obligatoire.";
    } else if (!preg_match("/^\d{5}(?:-\d{4})?$/", $_POST["enterprise_zipcode"])) {
        $errors['enterprise_zipcode'] = "Le code postal est invalide.";
    } else if (strlen($_POST["enterprise_zipcode"])!== 5) {
        $errors ["enterprise_siret"] = "Le code postal doit comporter 5 caractères.";
    }

    // Vérification de la ville de l'entreprise

    if (empty($_POST["enterprise_city"])) {
        $errors['enterprise_city'] = "Champs obligatoire.";
    } else if (!preg_match("/^[a-zA-ZÀ-ÿ\-\d ]+$/", $_POST["enterprise_city"])) {
        $errors['enterprise_city'] = "Le nom est invalide.";
    }


    // Vérification du mot de passe
    $enterprise_password = $_POST["enterprise_password"];
    $confirm_password = $_POST["confirm_password"];
    if (empty($enterprise_password) || strlen($enterprise_password) < 8 || $enterprise_password !== $confirm_password) {
        $errors['enterprise_password'] = "Le mot de passe doit comporter au moins 8 caractères et correspondre.";
    }


    // Afficher la synthèse des informations et le message de confirmation
    if (empty($errors)) {

        // Instance d'une PDO 
        try {

            $enterprise_name = $_POST['enterprise_name'];
            $enterprise_email = $_POST['enterprise_email'];
            $enterprise_siret = $_POST['enterprise_siret'];
            $enterprise_adress = $_POST['enterprise_adress'];
            $enterprise_password = $_POST['enterprise_password'];
            $enterprise_zipcode = $_POST['enterprise_zipcode'];
            $enterprise_city = $_POST['enterprise_city'];


            Entreprise::createEntreprise($enterprise_name, $enterprise_email, $enterprise_siret, $enterprise_adress, $enterprise_password, $enterprise_zipcode, $enterprise_city);
        } catch (PDOException $e) {
            echo "Erreur : " . $e->getMessage();
            die();
        }
        include('../views/view-signup.php');
        exit; // Arrêter l'exécution du script
    }
}
?>
<?php


// Contrôleur - Gestion de la logique métier

// Vérifications et traitements du formulaire ici

// Inclusion de la vue
include_once('../views/view-signup.php');
?>